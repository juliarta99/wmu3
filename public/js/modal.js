class ReusableModal {
    constructor() {
        this.isOpen = false;
        this.currentModal = null;
        this.container = document.getElementById('modalContainer');
    }

    createModal(config) {
        const modal = document.createElement('div');
        modal.className = `fixed inset-0 z-50 flex items-center justify-center p-4 modal-overlay bg-black/50 opacity-0 invisible transition-all duration-300`;
        modal.id = config.id || 'modal';

        modal.innerHTML = `
            <div class="modal-content bg-white rounded-2xl w-full max-w-[calc(100%-16px)] md:max-w-lg max-h-screen md:max-h-[90vh] overflow-x-hidden overflow-y-auto transform translate-y-12 scale-95 transition-all duration-300">
                ${config.showHeader !== false ? `
                    <div class="modal-header flex items-center justify-between p-6 border-b border-gray-200">
                        <div class="flex items-center gap-3">
                            ${config.icon || ''}
                            <h2 class="text-xl font-semibold text-gray-800">${config.title || 'Modal'}</h2>
                        </div>
                        <button class="modal-close text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-full p-2 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                ` : ''}
                <div class="modal-body p-6 max-h-[70vh] overflow-y-auto">
                    ${config.content || ''}
                </div>
                ${config.footer ? `
                    <div class="modal-footer flex justify-end gap-3 p-6 border-t border-gray-200 bg-gray-50">
                        ${config.footer}
                    </div>
                ` : ''}
            </div>
        `;

        return modal;
    }

    show(config) {
        if (this.isOpen) return;

        const modal = this.createModal(config);
        this.container.appendChild(modal);
        this.currentModal = modal;

        this.addEventListeners(modal, config);

        document.body.style.overflow = 'hidden';

        requestAnimationFrame(() => {
            modal.classList.remove('opacity-0', 'invisible');
            modal.classList.add('opacity-100', 'visible');
            
            const content = modal.querySelector('.modal-content');
            content.classList.remove('translate-y-12', 'scale-95');
            content.classList.add('translate-y-0', 'scale-100');
        });

        this.isOpen = true;

        if (config.onShow) config.onShow(modal);
    }

    hide(callback) {
        if (!this.isOpen || !this.currentModal) return;

        const modal = this.currentModal;
        const content = modal.querySelector('.modal-content');

        modal.classList.remove('opacity-100', 'visible');
        modal.classList.add('opacity-0', 'invisible');
        
        content.classList.remove('translate-y-0', 'scale-100');
        content.classList.add('translate-y-12', 'scale-95');

        setTimeout(() => {
            if (modal.parentNode) {
                modal.parentNode.removeChild(modal);
            }
            document.body.style.overflow = 'auto';
            this.isOpen = false;
            this.currentModal = null;
            
            if (callback) callback();
        }, 300);
    }

    addEventListeners(modal, config) {
        const closeBtn = modal.querySelector('.modal-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                this.hide(config.onHide);
            });
        }

        modal.addEventListener('click', (e) => {
            if (e.target === modal && config.closeOnOverlay !== false) {
                this.hide(config.onHide);
            }
        });

        const handleEscape = (e) => {
            if (e.key === 'Escape' && config.closeOnEscape !== false) {
                document.removeEventListener('keydown', handleEscape);
                this.hide(config.onHide);
            }
        };
        document.addEventListener('keydown', handleEscape);

        if (config.events) {
            config.events.forEach(event => {
                const element = modal.querySelector(event.selector);
                if (element) {
                    element.addEventListener(event.type, event.handler);
                }
            });
        }
    }

    confirm(config) {
        const defaultConfig = {
            title: 'Konfirmasi',
            icon: `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.728-.833-2.498 0L4.316 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
            </svg>`,
            content: config.message || 'Apakah Anda yakin?',
            footer: `
                <button class="cancel-btn px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                    ${config.cancelText || 'Batal'}
                </button>
                <button class="confirm-btn px-6 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors duration-200">
                    ${config.confirmText || 'Ya, Yakin'}
                </button>
            `,
            events: [
                {
                    selector: '.cancel-btn',
                    type: 'click',
                    handler: () => {
                        this.hide();
                        if (config.onCancel) config.onCancel();
                    }
                },
                {
                    selector: '.confirm-btn',
                    type: 'click',
                    handler: () => {
                        this.hide();
                        if (config.onConfirm) config.onConfirm();
                    }
                }
            ]
        };

        this.show({ ...defaultConfig, ...config });
    }

    alert(config) {
        const alertTypes = {
            info: {
                title: 'Informasi',
                icon: `<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>`,
                buttonClass: 'bg-blue-500 hover:bg-blue-600',
                borderClass: 'border-blue-200',
                bgClass: 'bg-blue-50'
            },
            success: {
                title: 'Berhasil',
                icon: `<svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>`,
                buttonClass: 'bg-green-500 hover:bg-green-600',
                borderClass: 'border-green-200',
                bgClass: 'bg-green-50'
            },
            error: {
                title: 'Error',
                icon: `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>`,
                buttonClass: 'bg-red-500 hover:bg-red-600',
                borderClass: 'border-red-200',
                bgClass: 'bg-red-50'
            }
        };

        const alertType = config.type || 'info';
        const typeConfig = alertTypes[alertType] || alertTypes.info;

        const defaultConfig = {
            title: config.title || typeConfig.title,
            icon: typeConfig.icon,
            content: config.message || '',
            footer: `
                <button class="ok-btn px-6 py-2 ${typeConfig.buttonClass} text-white rounded-lg transition-colors duration-200">
                    ${config.okText || 'OK'}
                </button>
            `,
            borderClass: typeConfig.borderClass,
            bgClass: typeConfig.bgClass,
            events: [
                {
                    selector: '.ok-btn',
                    type: 'click',
                    handler: () => {
                        this.hide();
                        if (config.onOk) config.onOk();
                    }
                }
            ]
        };

        this.show({ ...defaultConfig, ...config });
    }
}