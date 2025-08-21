class BlobManager {
    constructor() {
        this.container = document.getElementById('blob-container');
        this.isRunning = true;
        this.colors = [
            'bg-pink-500/40',
            'bg-blue-500/40', 
            'bg-indigo-600/40',
            'bg-purple-500/40'
        ];
        this.activeBlobs = [];
        this.maxBlobs = 5;
        
        this.init();
    }
    
    init() {
        this.startAnimation();
        this.setupControls();
    }
    
    createBlob() {
        if (this.activeBlobs.length >= this.maxBlobs) {
            return;
        }
        
        const blob = document.createElement('div');
        const size = this.getRandomSize();
        const color = this.getRandomColor();
        const position = this.getRandomPosition();
        
        blob.className = `absolute rounded-full blur-3xl opacity-0 transition-all duration-2000 ease-in-out ${color}`;
        blob.style.width = `${size}px`;
        blob.style.height = `${size}px`;
        blob.style.left = `${position.x}%`;
        blob.style.top = `${position.y}%`;
        blob.style.transform = 'translate(-50%, -50%)';
        
        this.container.appendChild(blob);
        this.activeBlobs.push(blob);
        
        this.animateBlob(blob);
        
        setTimeout(() => {
            this.removeBlob(blob);
        }, this.getRandomDuration());
    }
    
    animateBlob(blob) {
        setTimeout(() => {
            blob.classList.remove('opacity-0');
            blob.classList.add('opacity-100');
        }, 100);
        
        this.moveBlob(blob);
    }
    
    moveBlob(blob) {
        const moveBlob = () => {
            if (!blob.parentNode || !this.isRunning) return;
            
            const tx = (Math.random() - 0.5) * 200 + 'px';
            const ty = (Math.random() - 0.5) * 200 + 'px';
            const scale = 0.5 + Math.random() * 1.5;
            
            blob.style.setProperty('--tx', tx);
            blob.style.setProperty('--ty', ty);
            blob.style.setProperty('--scale', scale);
            blob.classList.add('moving');
            
            setTimeout(moveBlob, 1000 + Math.random() * 3000);
        };
        
        moveBlob();
    }
    
    removeBlob(blob) {
        if (!blob.parentNode) return;
        
        blob.classList.remove('opacity-100');
        blob.classList.add('opacity-0', 'scale-50');
        
        setTimeout(() => {
            if (blob.parentNode) {
                this.container.removeChild(blob);
            }
            this.activeBlobs = this.activeBlobs.filter(b => b !== blob);
        }, 2000);
    }
    
    getRandomSize() {
        return 60 + Math.random() * 100;
    }
    
    getRandomColor() {
        return this.colors[Math.floor(Math.random() * this.colors.length)];
    }
    
    getRandomPosition() {
        return {
            x: Math.random() * 100,
            y: Math.random() * 100
        };
    }
    
    getRandomDuration() {
        return 8000 + Math.random() * 10000;
    }
    
    getRandomInterval() {
        return 2000 + Math.random() * 2000;
    }
    
    startAnimation() {
        const createNext = () => {
            if (this.isRunning) {
                this.createBlob();
                setTimeout(createNext, this.getRandomInterval());
            }
        };
        
        this.createBlob();
        setTimeout(createNext, this.getRandomInterval());
    }
    
    clearAll() {
        this.activeBlobs.forEach(blob => {
            if (blob.parentNode) {
                this.container.removeChild(blob);
            }
        });
        this.activeBlobs = [];
    }
}