import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.util.Properties;

import javax.mail.*;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;


public class SendMail extends HttpServlet {
	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {

		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
	
		String to=request.getParameter("mailid");
		String subject="Confirmation Mail";
		String msg="Your account has been successfully created in iSkool.Start Learning :)";
		
//		Mailer.send(to, subject, msg);
                Properties props = new Properties();  
                props.put("mail.smtp.host", "smtp.gmail.com");  
                props.put("mail.smtp.socketFactory.port", "465");  
                props.put("mail.smtp.socketFactory.class","javax.net.ssl.SSLSocketFactory");  
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
                out.print("Sign Up successfull.A Confirmation mail has been sent to your registered email id.");
   //System.out.println("message sent successfully");
   
                } catch (MessagingException e) {
                    out.print("Given Email address does not exist");
                    //throw new RuntimeException(e);
                    }  
                        
                        out.close();
                    }

}
