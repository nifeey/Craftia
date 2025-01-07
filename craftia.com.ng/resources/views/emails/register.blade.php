{{-- This is the User Welcome E-mail after Registration file using Mailtrap --}} {{-- All the variables (like $name, $mobile, $email, ...) used here are passed in from the userRegister() method in Front/UserController.php --}}



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


        <table>
            <tr><td><img src="{{ asset('front/images/main-logo/nav-logo.png') }}"></td></tr>
            <tr><td>Dear {{ $name }},</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Welcome to Craftia. Your account has been successfully created with the information below:</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Name: {{ $name }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Mobile: {{ $mobile }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Email: {{ $email }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Password: ****** (as chosen by you)</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Thanks & Regards,</td></tr>
            <tr><td>Craftia</td></tr>
        </table>



    </body>
</html>