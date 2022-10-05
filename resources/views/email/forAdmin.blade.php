<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>email</title>
</head>
<body style="height: 100%;padding: 9px;margin: auto auto 8px;max-width: 900px;direction: rtl;">
<div>
    <div style="
    text-align: center;
    background: #094873;
    padding: 21px 15px;
    color: white;
">گزارش سلامت لاین تاریخ {{$date}}
    </div>
    <div style="
    padding: 24px 15px;
    color: #414141;
    font-size: 15px;
">
        سلام مدیر سایت فروشگاه
        <br style="
    height: 12px;
    display: block;
">
        گزارش زیر خلاصه ای از اتفاقات سایت های شماست که در یک روز اخیر رخ داده، برای مشاهده کامل این گزارش لطفا بر روی
        دکمه ورود به پنل کلیک کنید.
    </div>
    <div>
        <table class="hover" style="
    width: 100%;
">
            <thead>
            <tr style="padding: 9px;text-align: right;background: #094873;color: white;font-size: 15px;border: none;font-weight: 300;border-collapse: unset;">
                <th width="300" style="font-weight: 300;padding: 10px 24px;">عنوان</th>
                <th width="200" style="
    font-weight: 300;
    padding: 10px 24px;
">توضیحات
                </th>
                <th style="
    padding: 10px 24px;
    font-weight: 500;
">لینک
                </th>
            </tr>
            </thead>
            <tbody style="
    background: #eaeaea;
    font-size: 15px;
">
            <tr>
                <td style="
    padding: 10px 24px;
">تعداد بازدید های کل سایت
                </td>
                <td style="
    padding: 10px 24px;
    padding: 10px 24px;
">{{$allView}} نفر
                </td>
                <td class="text-center" style="
    padding: 10px 24px;
">
                    لینک بازدید
                </td>
            </tr>
            <tr>
                <td style="padding: 10px 24px;">تراکنش کل خرید</td>
                <td style="padding: 10px 24px;">{{$buy}} تومان</td>
                <td class="text-center" style="padding: 10px 24px;">لینک بازدید</td>
            </tr>
            <tr>
                <td style="padding: 10px 24px;">ثبت نام افراد جدید</td>
                <td style="padding: 10px 24px;">{{$newUser}} نفر</td>
                <td class="text-center" style="padding: 10px 24px;">لینک بازدید
                </td>
            </tr>
            <tr>
                <td style="padding: 10px 24px;">ثبت محصول جدید</td>
                <td style="padding: 10px 24px;">{{$newProduct}} محصول جدید</td>
                <td class="text-center" style="padding: 10px 24px;">لینک بازدید</td>
            </tr>
            <tr style="">
                <td style="padding: 10px 24px;">تعداد نظرات کاربران</td>
                <td style="padding: 10px 24px;">{{$newComment}} نظر جدید از کاربران</td>
                <td class="text-center" style="padding: 10px 24px;">
                    لینک بازدید
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="text-align: center;background: #094873;padding: 21px 15px;margin-top: 54px;"><a
                href="https://salamatline.com" style="color: white;text-decoration: unset;">www.salamatline.com</a>
    </div>
</div>
</body>
</html>