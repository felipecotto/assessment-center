<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8"> <!-- utf-8 works for most cases -->
  <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
  <title>Meu resultado</title> <!-- The title tag shows in email notifications, like Android 4.4. -->

  <!-- Web Font / @font-face : BEGIN -->
  <!-- NOTE: If web fonts are not required, lines 9 - 26 can be safely removed. -->
  
  <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
  <!--[if mso]>
    <style>
      * {
        font-family: sans-serif !important;
      }
    </style>
  <![endif]-->
  
  <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
  <!--[if !mso]><!-->
    <!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
  <!--<![endif]-->

  <!-- Web Font / @font-face : END -->
  
    <!-- CSS Reset -->
    <style type="text/css">

    /* What it does: Remove spaces around the email design added by some email clients. */
    /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
          margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }
        
        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        
        /* What is does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }
        
        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
                
        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto; 
        }
        
        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }
        
        /* What it does: A work-around for iOS meddling in triggered links. */
        .mobile-link--footer a,
        a[x-apple-data-detectors] {
            color:inherit !important;
            text-decoration: underline !important;
        }
      
    </style>
    
    <!-- Progressive Enhancements -->
    <style>
        
        /* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #186299 !important;
            border-color: #186299 !important;
        }

    </style>

</head>
<body width="100%" bgcolor="#222222" style="margin: 0;">
    <center style="width: 100%; background: #fff;">

        <!-- Visually Hidden Preheader Text : BEGIN -->
        <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
            {{ ucfirst(mb_strtolower($name)) }}
        </div>
        <!-- Visually Hidden Preheader Text : END -->

        <!--    
            Set the email width. Defined in two places:
            1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 600px.
            2. MSO tags for Desktop Windows Outlook enforce a 600px width.
        -->
        <div style="max-width: 600px; margin: auto;">
            <!--[if mso]>
            <table cellspacing="0" cellpadding="0" border="0" width="600" align="center">
            <tr>
            <td>
            <![endif]-->

            
            <!-- Email Body : BEGIN -->
            <table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="100%" style="max-width: 600px;">
                
            
                <!-- 1 Column Text + Button : BEGIN -->
                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                              <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
                                  <img src="logott.png" alt="TecTrain" style="margin: 0 auto; display: block; width: 230px; " />
                                  <br><br>        
                                  {{ $name }} , confira o resultado da <strong>Análise da Cultura Organizacional</strong> que você realizou.
                                  <br><br>
                                  <hr>
                                  <!-- Button : Begin -->
                                  <table cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto;">
                                      <tr>
                                          <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td">
                                              <a href="{{ $url }}" style="background: #f49e42; border: 15px solid #f49e42; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a">
                                            &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#ffffff"> Ver resultado </span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        </a>
                                          </td>
                                      </tr>
                                  </table>
                                  <!-- Button : END -->
                                  <br><br>
                                  
                                  Atenciosamente,<br>
                                  Equipe de Treinamento da TecTrain
                              </td>
                </tr>
                        </table>
                    </td>
                </tr>
                <!-- 1 Column Text + Button : BEGIN -->
               
                

            </table>
            <!-- Email Body : END -->
          
            <!-- Email Footer : BEGIN -->
            <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px;">
                <tr>
                    <td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: center; color: #888888;">
                        
                        TecTrain Digital<br><span class="mobile-link--footer"></span>
                        <br><br>
                    </td>
                </tr>
            </table>
            <!-- Email Footer : END -->

            <!--[if mso]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </div>
    </center>
</body>
</html>