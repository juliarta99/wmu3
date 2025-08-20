class ContributorManager {
    constructor() {
        this.contributorCount = document.querySelectorAll('.contributor-item').length || 1;
        this.container = document.getElementById('contributors-container');
        this.addButton = document.getElementById('add-contributor');
        this.init();
    }

    init() {
        this.addButton.addEventListener('click', () => this.addContributor());
        this.container.addEventListener('click', (e) => {
            if (e.target.closest('.delete-contributor')) {
                e.preventDefault();
                const contributorNumber = e.target.closest('.delete-contributor').getAttribute('data-contributor');
                this.removeContributor(contributorNumber);
            }
        });
    }

    addContributor() {
        this.contributorCount++;
        const contributorDiv = document.createElement('div');
        contributorDiv.className = 'contributor-item flex flex-col gap-1 opacity-0 transform translate-y-4';
        contributorDiv.setAttribute('data-contributor', this.contributorCount);
        
        contributorDiv.innerHTML = `
            <label for="contributor${this.contributorCount}" class="font-semibold">
                Nama Contributor ${this.contributorCount}
            </label>
            <div class="flex items-center gap-3 justify-between">
                <input 
                    type="text" 
                    id="contributor${this.contributorCount}" 
                    name="contributors[]" 
                    class="border w-full border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                    placeholder="Masukkan nama contributor ${this.contributorCount}"
                >
                <button 
                    type="button" 
                    class="delete-contributor text-red-500 hover:text-red-700 hover:bg-red-50 p-1 rounded transition-all duration-200"
                    data-contributor="${this.contributorCount}"
                    title="Hapus contributor"
                >
                    <svg class="size-6 fill-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.375 22C5.75625 22 5.22675 21.7826 4.7865 21.3478C4.34625 20.913 4.12575 20.3896 4.125 19.7778V5.33333H3V3.11111H8.625V2H15.375V3.11111H21V5.33333H19.875V19.7778C19.875 20.3889 19.6549 20.9122 19.2146 21.3478C18.7744 21.7833 18.2445 22.0007 17.625 22H6.375ZM17.625 5.33333H6.375V19.7778H17.625V5.33333ZM8.625 17.5556H10.875V7.55556H8.625V17.5556ZM13.125 17.5556H15.375V7.55556H13.125V17.5556Z"/>
                    </svg>
                </button>
            </div>
        `;

        this.container.appendChild(contributorDiv);

        requestAnimationFrame(() => {
            contributorDiv.classList.remove('opacity-0', 'translate-y-4');
            contributorDiv.classList.add('opacity-100', 'translate-y-0');
        });
    }

    removeContributor(contributorNumber) {
        const contributorItem = document.querySelector(`[data-contributor="${contributorNumber}"]`);
        
        if (!contributorItem) return;

        const allContributors = this.container.querySelectorAll('.contributor-item');
        if (allContributors.length <= 1) {
            modal.alert({
                message: 'Minimal harus ada 1 contributor.',
                type: 'error'
            });
            return;
        }

        contributorItem.classList.add('opacity-0');
        contributorItem.remove();
        this.updateLabels();
    }

    updateLabels() {
        const contributorItems = this.container.querySelectorAll('.contributor-item');
        
        contributorItems.forEach((item, index) => {
            const newNumber = index + 1;
            const label = item.querySelector('label');
            const input = item.querySelector('input');
            const deleteBtn = item.querySelector('.delete-contributor');
            
            item.setAttribute('data-contributor', newNumber);
            label.setAttribute('for', `contributor${newNumber}`);
            label.textContent = `Nama Contributor ${newNumber}`;
            input.id = `contributor${newNumber}`;
            input.placeholder = `Masukkan nama contributor ${newNumber}`;
            
            if (deleteBtn) {
                deleteBtn.setAttribute('data-contributor', newNumber);
            }
        });

        this.contributorCount = contributorItems.length;
    }
}