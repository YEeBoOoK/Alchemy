if (document.cookie.indexOf('cookieConsent=') === -1) {
    $('#cookie_alert').show();
}

$('#cookie_alert-close').click(function(e) {
e.preventDefault();
$('#cookie_alert').slideUp();

// Установка cookie для отслеживания согласия пользователя
document.cookie = 'cookieConsent=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
});