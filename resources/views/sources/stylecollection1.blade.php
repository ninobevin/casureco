  <link rel="stylesheet" href='{{ asset("bootstrap/css/bootstrap.min.css") }}'>
  <!-- Font Awesome -->
  <link rel="stylesheet" href='{{ asset("bower_components/font-awesome/css/font-awesome.min.css") }}'>
  <!-- Ionicons -->
  <link rel="stylesheet" href='{{ asset("bower_components/Ionicons/css/ionicons.min.css") }}'>
  <!-- Theme style -->
  <link rel="stylesheet" href='{{ asset("dist/css/AdminLTE.css") }}'>

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href='{{ asset("dist/css/skins/_all-skins.min.css") }}'>
  <link rel="stylesheet" href="{{  asset("plugins/iCheck/square/blue.css") }}">
  <link rel="stylesheet" href='{{ asset("bootstrap/css/jquery-ui.css") }}'>

   <style type="text/css">
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 300;
      src: local('Source Sans Pro Light Italic'), local('SourceSansPro-LightItalic'), url('{{ asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZZMkidh18Smxg.woff2")}}') format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }
    /* cyrillic */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 300;
      src: local('Source Sans Pro Light Italic'), local('SourceSansPro-LightItalic'), url('{{asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZZMkido18Smxg.woff2")}}') format('woff2');
      unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }
    /* greek-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 300;
      src: local('Source Sans Pro Light Italic'), local('SourceSansPro-LightItalic'), url('{{asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZZMkidg18Smxg.woff2")}}') format('woff2');
      unicode-range: U+1F00-1FFF;
    }
    /* greek */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 300;
      src: local('Source Sans Pro Light Italic'), local('SourceSansPro-LightItalic'), url('{{asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZZMkidv18Smxg.woff2")}}') format('woff2');
      unicode-range: U+0370-03FF;
    }
    /* vietnamese */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 300;
      src: local('Source Sans Pro Light Italic'), local('SourceSansPro-LightItalic'), url('{{asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZZMkidj18Smxg.woff2")}}') format('woff2');
      unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
    }
    /* latin-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 300;
      src: local('Source Sans Pro Light Italic'), local('SourceSansPro-LightItalic'), url('{{asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZZMkidi18Smxg.woff2")}}') format('woff2');
      unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    /* latin */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 300;
      src: local('Source Sans Pro Light Italic'), local('SourceSansPro-LightItalic'), url('{{asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZZMkids18Q.woff2")}}') format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    /* cyrillic-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 400;
      src: local('Source Sans Pro Italic'), local('SourceSansPro-Italic'), url('{{asset("fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7qsDJT9g.woff2")}}') format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }
    /* cyrillic */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 400;
      src: local('Source Sans Pro Italic'), local('SourceSansPro-Italic'), url('{{asset("fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7jsDJT9g.woff2")}}')' format('woff2');
      unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }
    /* greek-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 400;
      src: local('Source Sans Pro Italic'), local('SourceSansPro-Italic'), url('{{asset("fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7rsDJT9g.woff2")}}') format('woff2');
      unicode-range: U+1F00-1FFF;
    }
    /* greek */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 400;
      src: local('Source Sans Pro Italic'), local('SourceSansPro-Italic'), url('{{asset("fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7ksDJT9g.woff2")}}') format('woff2');
      unicode-range: U+0370-03FF;
    }
    /* vietnamese */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 400;
      src: local('Source Sans Pro Italic'), local('SourceSansPro-Italic'), url('{{asset("fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7osDJT9g.woff2")}}') format('woff2');
      unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
    }
    /* latin-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 400;
      src: local('Source Sans Pro Italic'), local('SourceSansPro-Italic'), url('{{asset("fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7psDJT9g.woff2")}}') format('woff2');
      unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    /* latin */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 400;
      src: local('Source Sans Pro Italic'), local('SourceSansPro-Italic'), url('{{asset("fonts/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7nsDI.woff2")}}') format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    /* cyrillic-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold Italic'), local('SourceSansPro-SemiBoldItalic'), url('{{asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZY4lCdh18Smxg.woff2")}}') format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }
    /* cyrillic */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold Italic'), local('SourceSansPro-SemiBoldItalic'), url('{{asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZY4lCdo18Smxg.woff2")}}') format('woff2');
      unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }
    /* greek-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold Italic'), local('SourceSansPro-SemiBoldItalic'), url('{{asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZY4lCdg18Smxg.woff2")}}') format('woff2');
      unicode-range: U+1F00-1FFF;
    }
    /* greek */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold Italic'), local('SourceSansPro-SemiBoldItalic'), url('{{asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZY4lCdv18Smxg.woff2")}}') format('woff2');
      unicode-range: U+0370-03FF;
    }
    /* vietnamese */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold Italic'), local('SourceSansPro-SemiBoldItalic'), url('{{asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZY4lCdj18Smxg.woff2")}}') format('woff2');
      unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
    }
    /* latin-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold Italic'), local('SourceSansPro-SemiBoldItalic'), url('{{asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZY4lCdi18Smxg.woff2")}}') format('woff2');
      unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    /* latin */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: italic;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold Italic'), local('SourceSansPro-SemiBoldItalic'), url('{{asset("fonts/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZY4lCds18Q.woff2")}}') format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    /* cyrillic-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 300;
      src: local('Source Sans Pro Light'), local('SourceSansPro-Light'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwmhduz8A.woff2")}}') format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }
    /* cyrillic */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 300;
      src: local('Source Sans Pro Light'), local('SourceSansPro-Light'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwkxduz8A.woff2")}}') format('woff2');
      unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }
    /* greek-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 300;
      src: local('Source Sans Pro Light'), local('SourceSansPro-Light'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwmxduz8A.woff2")}}') format('woff2');
      unicode-range: U+1F00-1FFF;
    }
    /* greek */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 300;
      src: local('Source Sans Pro Light'), local('SourceSansPro-Light'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwlBduz8A.woff2")}}') format('woff2');
      unicode-range: U+0370-03FF;
    }
    /* vietnamese */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 300;
      src: local('Source Sans Pro Light'), local('SourceSansPro-Light'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwmBduz8A.woff2")}}') format('woff2');
      unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
    }
    /* latin-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 300;
      src: local('Source Sans Pro Light'), local('SourceSansPro-Light'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwmRduz8A.woff2")}}') format('woff2');
      unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    /* latin */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 300;
      src: local('Source Sans Pro Light'), local('SourceSansPro-Light'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwlxdu.woff2")}}') format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    /* cyrillic-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 400;
      src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url('{{asset("fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qNa7lqDY.woff2")}}') format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }
    /* cyrillic */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 400;
      src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url('{{asset("fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qPK7lqDY.woff2")}}') format('woff2');
      unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }
    /* greek-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 400;
      src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url('{{asset("fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qNK7lqDY.woff2")}}') format('woff2');
      unicode-range: U+1F00-1FFF;
    }
    /* greek */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 400;
      src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url('{{asset("fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qO67lqDY.woff2")}}') format('woff2');
      unicode-range: U+0370-03FF;
    }
    /* vietnamese */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 400;
      src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url('{{asset("fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qN67lqDY.woff2")}}') format('woff2');
      unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
    }
    /* latin-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 400;
      src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url('{{asset("fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qNq7lqDY.woff2")}}') format('woff2');
      unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    /* latin */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 400;
      src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url('{{asset("fonts/6xK3dSBYKcSV-LCoeQqfX1RYOo3qOK7l.woff2")}}') format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    /* cyrillic-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold'), local('SourceSansPro-SemiBold'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwmhduz8A.woff2")}}') format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }
    /* cyrillic */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold'), local('SourceSansPro-SemiBold'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwkxduz8A.woff2")}}') format('woff2');
      unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }
    /* greek-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold'), local('SourceSansPro-SemiBold'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwmxduz8A.woff2")}}') format('woff2');
      unicode-range: U+1F00-1FFF;
    }
    /* greek */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold'), local('SourceSansPro-SemiBold'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwlBduz8A.woff2")}}') format('woff2');
      unicode-range: U+0370-03FF;
    }
    /* vietnamese */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold'), local('SourceSansPro-SemiBold'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwmBduz8A.woff2")}}') format('woff2');
      unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
    }
    /* latin-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold'), local('SourceSansPro-SemiBold'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwmRduz8A.woff2")}}') format('woff2');
      unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    /* latin */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 600;
      src: local('Source Sans Pro SemiBold'), local('SourceSansPro-SemiBold'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwlxdu.woff2")}}') format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    /* cyrillic-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 700;
      src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwmhduz8A.woff2")}}') format('woff2');
      unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
    }
    /* cyrillic */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 700;
      src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwkxduz8A.woff2")}}') format('woff2');
      unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
    }
    /* greek-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 700;
      src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwmxduz8A.woff2")}}') format('woff2');
      unicode-range: U+1F00-1FFF;
    }
    /* greek */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 700;
      src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwlBduz8A.woff2")}}') format('woff2');
      unicode-range: U+0370-03FF;
    }
    /* vietnamese */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 700;
      src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwmBduz8A.woff2")}}') format('woff2');
      unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
    }
    /* latin-ext */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 700;
      src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url('{{ asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwmRduz8A.woff2") }}') format('woff2');
      unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    /* latin */
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 700;
      src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url('{{asset("fonts/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwlxdu.woff2")}}') format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

   </style>
