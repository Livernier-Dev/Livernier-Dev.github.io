const wordflick = document.getElementById('wordflick');
const texts = ['สวัสดี, ยินดีต้อนรับสู่ Livernier Developer', 'เราพร้อมให้บริการ', 'โปรดเลือกซื้อสินค้าได้ตามที่ท่านต้องการ'];

let index = 0;
let charIndex = 0;
let isDeleting = false;

function typeText() {
    const currentText = texts[index];
    const speed = isDeleting ? 50 : 100;

    if (!isDeleting && charIndex === currentText.length) {
        isDeleting = true;
        setTimeout(() => {
            wordflick.textContent = currentText.substring(0, charIndex);
            charIndex--;
            typeText();
        }, 1000);
    } else if (isDeleting && charIndex === 0) {
        isDeleting = false;
        index = (index + 1) % texts.length;
        setTimeout(typeText, 300);
    } else {
        const text = isDeleting ? currentText.substring(0, charIndex - 1) : currentText.substring(0, charIndex + 1);
        wordflick.textContent = text;
        charIndex = isDeleting ? charIndex - 1 : charIndex + 1;
        setTimeout(typeText, speed);
    }

}