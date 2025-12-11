<?php

// ========== 1) استلام البيانات من الفورم ==========
$name        = $_POST['name'];
$number      = $_POST['number']; // الرقم المدني
$phone       = $_POST['phone'];
$email       = $_POST['email'];
$service     = $_POST['service_type'];
$message     = $_POST['message'];

// ========== 2) الإيميل اللي هيوصل عليه الرسالة ==========
$to = "YOUR_EMAIL@example.com";  // <-- غيريه لإيميلك الحقيقي

// ========== 3) عنوان الرسالة ==========
$subject = "New Consultation Request from Website";

// ========== 4) محتوى الرسالة ==========
$body = "
New Consultation Request:

Name: $name
Civil ID Number: $number
Phone: $phone
Email: $email
Service Type: $service
Message:
$message
";

// ========== 5) الهيدر ==========
$headers = "From: Consultation@LawyerEman.com\r\n"; // تغيير اسم المرسل لاسم أكثر احترافية
$headers .= "Reply-To: $email \r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";


// ========== 6) إرسال الإيميل ==========
if (mail($to, $subject, $body, $headers)) {
    
    // رسالة نجاح بعد الإرسال
    echo "
    <html>
        <head>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap');
            </style>
        </head>
        <body style='font-family:Tajawal, Arial; text-align:center; padding-top:50px; background-color: #111; color: white;'>
            <h2 style='color: #c5a059;'>✔ تم إرسال طلبك بنجاح</h2>
            <p>سنتواصل معك في أقرب وقت.</p>
            <a href='index.html' style='color: #c5a059; text-decoration: none;'>العودة للصفحة الرئيسية</a>
        </body>
    </html>
    ";
    
} else {
    
    // رسالة فشل
    echo "
    <html>
        <head>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap');
            </style>
        </head>
        <body style='font-family:Tajawal, Arial; text-align:center; padding-top:50px; background-color: #111; color: white;'>
            <h2 style='color:red;'>❌ حدث خطأ أثناء إرسال الرسالة</h2>
            <p>من فضلك حاولي مرة أخرى.</p>
            <a href='index.html' style='color: #c5a059; text-decoration: none;'>العودة</a>
        </body>
    </html>
    ";
}

?>