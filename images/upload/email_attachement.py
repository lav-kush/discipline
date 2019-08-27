from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
import smtplib
import mimetypes
import email.mime.application

smtp_ssl_host = 'smtp.googlemail.com'  # smtp.mail.yahoo.com
smtp_ssl_port = 465
s = smtplib.SMTP_SSL(smtp_ssl_host, smtp_ssl_port)
email_user = "lavlove000@gmail.com"
email_pass = "Lav123456*"
s.login(email_user, email_pass)
print('login to email successfull!')

msg = MIMEMultipart()
msg['Subject'] = 'I have a picture'
msg['From'] = email_user
msg['To'] = email_user
txt = MIMEText('I just bought a new camera.')
msg.attach(txt)

filename = 'lav_kush.jpg' #path to file
fo=open(filename,'rb')
attach = email.mime.application.MIMEApplication(fo.read(),_subtype="jpg")
fo.close()
attach.add_header('Content-Disposition','attachment',filename=filename)
msg.attach(attach)
s.send_message(msg)
s.quit()
print('mail sent successfully')
