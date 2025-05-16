function klasikKontrol() {
    const ad = document.forms[0]["ad"].value.trim();
    const mail = document.forms[0]["mail"].value.trim();
    const mesaj = document.forms[0]["mesaj"].value.trim();

    const mailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (ad === "" || mail === "" || mesaj === "") {
        alert("Ad, mail ve mesaj alanları boş bırakılamaz.");
        return false;
    }

    if (!mailRegex.test(mail)) {
        alert("Geçerli bir e-posta adresi giriniz.");
        return false;
    }

    alert("Klasik JS kontrolü başarılı!");
    return true;
}
