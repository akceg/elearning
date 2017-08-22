import java.util.Properties;

import javax.mail.*;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;

public class Mailer {
public static void send(String to,String subject,String msg){

//String to="arunkumaras10@gmail.com";//change accordingly  
  
  //Get the session object  
  Properties props = new Properties();  
  props.put("mail.smtp.host", "smtp.gmail.com");  
  props.put("mail.smtp.socketFactory.port", "465");  
  props.put("mail.smtp.socketFactory.class",  
            "javax.net.ssl.SSLSocketFactory");  
  props.put("mail.smtp.auth", "true");  
  props.put("mail.smtp.port", "465");  
   
  Session session = Session.getInstance(props,  new javax.mail.Authenticator() {
  protected PasswordAuthentication getPasswordAuthentication() {  
   return new PasswordAuthentication("iskool101@gmail.com","admin@sas");//change accordingly  
   }  
  });  
   
  //compose message  
  try {  
   MimeMessage message = new MimeMessage(session);  
   message.setFrom(new InternetAddress("iskool101@gmail.com"));//change accordingly  
   message.addRecipient(Message.RecipientType.TO,new InternetAddress(to));  
   message.setSubject(subject);
   message.setText(msg);  
     
   //send message  
   Transport.send(message);  
  
   //System.out.println("message sent successfully");
   
  } catch (MessagingException e) {throw new RuntimeException(e);}  
   
 }  
}
