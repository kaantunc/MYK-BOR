jQuery.extend(jQuery.validator.messages, {
    required: "*",
    email: "Lütfen geçerli bir e-posta adresi giriniz.(Örn: a@b.com)",
    url: "Lütfen geçerli bir url giriniz.(Örn: http://www.url.com)",
    number: "Lütfen sayı giriniz.",
    
    remote: "Lütfen bu alanı düzeltiniz.",
    date: "Lütfen geçerli bir tarih giriniz.",
    dateISO: "Lütfen geçerli bir tarih giriniz. (ISO).",
    digits: "Lütfen sadece sayı giriniz.",
    creditcard: "Lütfen geçerli bir kredi kartı numarası giriniz.",
    equalTo: "Lütfen aynı değeri tekrar giriniz..",
    accept: "Lütfen geçerli uzantıya sahip bir dosya adı giriniz.",
    maxlength: jQuery.validator.format("Lütfen {0} karakterden fazla girmeyiniz.."),
    minlength: jQuery.validator.format("Lütfen en az {0} karakter giriniz."),
    rangelength: jQuery.validator.format("Lütfen {0} ve {1} arasında karakter giriniz.."),
    range: jQuery.validator.format("Lütfen {0} ve {1} arasında bir değer giriniz.."),
    max: jQuery.validator.format("Lütfen {0} 'a/e eşit ya da daha küçük bir değer giriniz."),
    min: jQuery.validator.format("Lütfen {0} 'a/e eşit ya da daha büyük bir değer giriniz.")
});
