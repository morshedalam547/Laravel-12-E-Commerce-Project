<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Status Updated</title>
</head>

<body style="margin:0; padding:0; background:#f5f5f5; font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding:35px 15px;">

                <!-- MAIN CARD -->
                <table width="620" cellpadding="0" cellspacing="0"
                       style="background:#ffffff; border-radius:18px; overflow:hidden; color:#333;
                              box-shadow:0 0 40px rgba(0,0,0,0.08); border:1px solid #eee;">

                    <!-- GOLD TOP BAR -->
                    <tr>
                        <td style="
                            background:#ffffff;
                            border-bottom:4px solid #d4af37;
                            padding:28px;
                            text-align:center;">
                            
                            <h1 style="margin:0; font-size:28px; color:#222; font-weight:600;">
                                POS Application
                            </h1>

                            <p style="margin:8px 0 0; font-size:15px; color:#666;">
                                Your Order Status Has Been Updated
                            </p>
                        </td>
                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:40px 45px 35px 45px;">

                            <h3 style="margin-top:0; font-size:22px; color:#222;">
                                Hello {{ $order->user->name }},
                            </h3>

                            <p style="font-size:16px; color:#444; line-height:1.7; margin-bottom:25px;">
                                We wanted to let you know that your order 
                                <strong style="color:#111;">#{{ $order->order_id }}</strong> 
                                has a new update.
                            </p>

                            <!-- STATUS BOX -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                   style="
                                        background:#faf7f0;
                                        border-left:6px solid #d4af37;
                                        padding:18px 20px;
                                        border-radius:10px;
                                        margin-bottom:25px;
                                   ">
                                <tr>
                                    <td>
                                        <span style="font-size:18px; text-transform:capitalize; color:#6f5400; font-weight:bold;">
                                            Current Status: {{ $order->status }}
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            <!-- STATUS DETAILS -->
                            @if($order->status == 'processing')
                                <p style="font-size:16px; color:#555;">
                                    ⏳ Your order is currently <strong>being processed</strong>.
                                </p>
                            @endif

                            @if($order->status == 'delivered')
                                <p style="font-size:16px; color:#2da673;">
                                    🎉 Your order has been <strong>delivered successfully!</strong>
                                </p>
                                <p style="font-size:15px; color:#444;">
                                    Delivered on: <strong>{{ $order->delivered_date }}</strong>
                                </p>
                            @endif

                            @if($order->status == 'canceled')
                                <p style="font-size:16px; color:#d9534f;">
                                    ❌ Your order has been <strong>canceled</strong>.
                                </p>
                                <p style="font-size:15px; color:#444;">
                                    Canceled on: <strong>{{ $order->canceled_date }}</strong>
                                </p>
                            @endif


                            <!-- CTA BUTTON -->
                            <p style="margin:40px 0 20px;">
                                <a href="{{ route('user.orders.show', $order->id) }}"
                                   style="
                                        background:#d4af37;
                                        padding:14px 32px;
                                        text-decoration:none;
                                        color:#fff;
                                        font-size:17px;
                                        border-radius:8px;
                                        font-weight:600;
                                        display:inline-block;
                                        box-shadow:0 3px 12px rgba(212,175,55,0.4);
                                   ">
                                    View Order Details
                                </a>
                            </p>

                            <!-- SEPARATOR -->
                            <hr style="border:0; border-top:1px solid #e6e6e6; margin:40px 0;">

                            <p style="font-size:14px; color:#777;">
                                Thank you for shopping with 
                                <strong style="color:#222;">POS Application</strong>.
                            </p>

                            <p style="font-size:12px; color:#999;">
                                This is an automated email. Please do not reply.
                            </p>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style="
                            background:#fafafa;
                            padding:20px;
                            text-align:center;
                            font-size:12px;
                            color:#999;
                            border-top:1px solid #eee;">
                            
                            © {{ date('Y') }} POS Application — All Rights Reserved.
                        </td>
                    </tr>

                </table>
                <!-- END CARD -->

            </td>
        </tr>
    </table>

</body>
</html>
