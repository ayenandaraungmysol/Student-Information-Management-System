<!DOCTYPE html>
<html>
<head>
    <title>Notification of Student Class Change</title>
</head>
<body>
    <p>Dear {{ $teacherName }},</p>

    <p>I hope this message finds you well.</p>

    <p>I am writing to inform you of an important update regarding one of our students, {{ $studentName }}. Effective {{ $effectiveDate }}, {{ $studentName }} will be transitioning from {{ $currentClass }} to {{ $newClass }}.</p>

    <p>This change has been made to better accommodate {{ $studentName }}'s academic needs and to ensure they receive the most appropriate educational environment for their development. We believe this move will be beneficial for {{ $studentName }} and will support their continued growth and success.</p>

    <p>Details of the Change:</p>
    <ul>
        <li><strong>Student's Name:</strong> {{ $studentName }}</li>
        <li><strong>Current Class/Section:</strong> {{ '['.$studentGrade.'/'.$currentClass.']' }}</li>
        <li><strong>New Class/Section:</strong> {{ '['.$studentGrade.'/'.$newClass.']' }}</li>
        <li><strong>Effective Date:</strong> {{ $effectiveDate }}</li>
    </ul>

    <p>Please update your records accordingly and feel free to reach out if you have any questions or require further information. Your cooperation and support in this matter are greatly appreciated.</p>

    <p>Thank you for your understanding and continued dedication to our students' education.</p>

    <p>Warm regards,</p>
    <p>[ANDA]</p>
    <p>[Project Admin]</p>
    <p>[Laravel Project School]</p>
    <p>[098760489]</p>
    <p>[admin@gmail.com]</p>
</body>
</html>
