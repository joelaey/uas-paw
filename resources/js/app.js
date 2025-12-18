import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('otpVerification', () => ({
    otp: ['', '', '', ''],

    get allFilled() {
        return this.otp.every(digit => digit !== '')
    },

    handleInput(event, index) {
        const value = event.target.value.replace(/\D/g, '')
        this.otp[index] = value

        if (value && index < this.otp.length - 1) {
            event.target.nextElementSibling?.focus()
        }
    }
}))

function updateDateTime() {
    const now = new Date();

    const optionsDate = {
        day: '2-digit',
        month: 'long',
        year: 'numeric'
    };

    const optionsTime = {
        hour: '2-digit',
        minute: '2-digit'
    };

    const time = now.toLocaleTimeString('id-ID', optionsTime);
    const date = now.toLocaleDateString('id-ID', optionsDate);

    const el = document.getElementById('datetime');
    if (el) {
        el.innerText = `${time} - ${date}`;
    }
}

setInterval(updateDateTime, 1000);
updateDateTime();


Alpine.start()
