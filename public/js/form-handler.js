class FormHandler {
    constructor(options = {}) {
        this.form = document.getElementById(options.formId);
        if (!this.form) throw new Error(`Form with id="${options.formId}" not found`);

        this.submitBtn = document.getElementById(options.submitBtnId || 'submit-btn');
        this.submitText = document.getElementById(options.submitTextId || 'submit-text');
        this.submitLoading = document.getElementById(options.submitLoadingId || 'submit-loading');
        this.cancelBtn = document.getElementById(options.cancelBtnId || 'cancel-btn');
        this.backBtn = document.getElementById(options.backBtnId || 'back-btn');

        this.redirectUrl = options.redirectUrl || "/";
        this.successMessage = options.successMessage || "Data berhasil disimpan!";
        this.validators = options.validators || (() => true);

        this.init();
    }

    init() {
        this.form.addEventListener('submit', (e) => this.handleSubmit(e));

        if (this.cancelBtn) {
            this.cancelBtn.addEventListener('click', (e) => this.handleCancel(e));
        }
        if (this.backBtn) {
            this.backBtn.addEventListener('click', (e) => this.handleCancel(e));
        }
    }

    handleCancel(e) {
        e.preventDefault();

        const formData = new FormData(this.form);
        const hasData = Array.from(formData.entries())
                        .filter(([k]) => !['_token', '_method'].includes(k))
                        .some(([k, v]) => typeof v === "string" && v.trim() !== "");

        if (hasData) {
            modal.confirm({
                message: 'Apakah Anda yakin ingin kembali? Data yang belum disimpan akan hilang.',
                confirmText: 'Ya, Kembali',
                cancelText: 'Batal',
                onConfirm: () => window.location.href = this.redirectUrl
            });
        } else {
            window.location.href = this.redirectUrl;
        }
    }

    handleSubmit(e) {
        e.preventDefault();
        this.clearErrors();

        if (!this.validators(this)) {
            return;
        }

        this.setLoading(true);

        const formData = new FormData(this.form);

        fetch(this.form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || document.querySelector('input[name="_token"]').value
            }
        })
        .then(r => r.json())
        .then(data => {
            this.setLoading(false);

            if (data.success) {
                modal.alert({
                    message: data.message || this.successMessage,
                    type: 'success',
                    onOk: () => window.location.href = this.redirectUrl
                });
            } else {
                if (data.errors) {
                    this.displayErrors(data.errors);
                } else {
                    modal.alert({
                        message: data.message || 'Terjadi kesalahan saat menyimpan data.',
                        type: 'error'
                    });
                }
            }
        })
        .catch(err => {
            this.setLoading(false);
            console.error(err);
            modal.alert({
                message: 'Terjadi kesalahan. Silakan coba lagi.',
                type: 'error'
            });
        });
    }

    showFieldError(field, message) {
        field.classList.add('border-red-500');

        const existingError = field.parentElement.querySelector('.field-error');
        if (existingError) existingError.remove();

        const errorSpan = document.createElement('span');
        errorSpan.className = 'field-error text-red-500 text-sm';
        errorSpan.textContent = message;
        field.parentElement.appendChild(errorSpan);
    }

    displayErrors(errors) {
        Object.keys(errors).forEach(field => {
            if (field.includes(".")) {
                const [name, index] = field.split(".");
                const input = document.querySelectorAll(`input[name="${name}[]"]`)[index];
                if (input) this.showFieldError(input, errors[field][0]);
            } else {
                const fieldElement = document.getElementById(field);
                if (fieldElement) {
                    this.showFieldError(fieldElement, errors[field][0]);
                }
            }
        });
    }

    clearErrors() {
        document.querySelectorAll('.border-red-500').forEach(el => el.classList.remove('border-red-500'));
        document.querySelectorAll('.field-error').forEach(el => el.remove());
    }

    setLoading(loading) {
        if (!this.submitBtn) return;
        this.submitBtn.disabled = loading;
        if (this.submitText) this.submitText.classList.toggle('hidden', loading);
        if (this.submitLoading) this.submitLoading.classList.toggle('hidden', !loading);
    }
}