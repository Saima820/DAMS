<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            color: #007bff;
        }
        .details {
            margin-bottom: 20px;
        }
        .details h2 {
            font-size: 20px;
            color: #343a40;
        }
        .details p {
            font-size: 16px;
            color: #6c757d;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
        }
        .footer p {
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{url('/logo.png')}}" alt="Clinic Logo">
            <h1>Appointment Reject</h1>
        </div>


        <div class="details">
            <h2>Dear {{$patientAppointment->patient->patient_name}},</h2>
            <p>We are sorry to inform you that your appointment is Rejected of {{$patientAppointment->doctor->name}} on {{$patientAppointment->appointment_date}} at {{$patientAppointment->slot->timeslot}}.</p>
            <p>Location: [22 Rabindra Sarani, Dhaka 1230]</p>
            <p>If you need to reschedule or cancel your appointment, please contact us at [ 01634382166] or reply to this email.</p>
        </div>

        <div class="footer">
            <p>Thank you for choosing [DAMS]. We look forward to seeing you!</p>
            <p>&copy; [DAMS]. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
