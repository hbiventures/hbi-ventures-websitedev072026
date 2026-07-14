<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Method not allowed'); }
if (!empty($_POST['website'] ?? '')) { header('Location: thank-you.html'); exit; }
function clean($value) { return trim(strip_tags((string)$value)); }
$first = clean($_POST['first_name'] ?? '');
$last = clean($_POST['last_name'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
$phone = clean($_POST['phone'] ?? '');
$org = clean($_POST['organization'] ?? '');
$interest = clean($_POST['interest'] ?? '');
$message = clean($_POST['message'] ?? '');
if (!$first || !$last || !$email || !$interest || !$message) { http_response_code(400); exit('Please complete all required fields.'); }
$to = 'info@hbiventures.com';
$subject = 'New HBI Ventures Website Inquiry: ' . $interest;
$body = "Name: $first $last\nOrganization: $org\nEmail: $email\nPhone: $phone\nArea of Interest: $interest\n\nMessage:\n$message\n";
$headers = [
  'From: HBI Ventures Website <website@hbiventures.com>',
  'Reply-To: ' . $email,
  'Content-Type: text/plain; charset=UTF-8',
  'X-Mailer: PHP/' . phpversion()
];
if (mail($to, $subject, $body, implode("\r\n", $headers))) { header('Location: thank-you.html'); exit; }
http_response_code(500); echo 'The message could not be sent. Please email info@hbiventures.com.';
?>
