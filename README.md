## Welcome to TINA4LOGIN module

Add these to your .env

```
[SSO_SETTINGS]
SSO_TOKEN=1234 //Bearer Auth Token for Tina4SSO
SSO_REDIRECT_URL=/ //The url to redirect to after successful login

[TINA4 LOGIN BASE]
BASE_TWIG_FILE=tina4Login-base.twig //This is the name of the your base.twig to extend 
                                      in your project
```