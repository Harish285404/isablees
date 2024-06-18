<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,200;0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;0,9..40,900;0,9..40,1000;1,9..40,100;1,9..40,200;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700;1,9..40,800;1,9..40,900;1,9..40,1000&display=swap"
        rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/belgiano" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body >
  <main class="content-main-block login-form">
      <div class="container">
<div class="login-main-img">
    <!--<img src="images/user/images/login-img.png">-->
    <svg width="191" height="98" viewBox="0 0 191 98" fill="none" xmlns="http://www.w3.org/2000/svg">
<g filter="url(#filter0_d_203_2027)">
<path d="M165.686 45.1582C165.345 45.7301 164.868 46.3263 164.291 46.8304L157.71 52.5054V45.1582H165.686Z" fill="url(#paint0_linear_203_2027)"/>
<path d="M92.4589 45.1582V46.5865H84.1795V48.4402H78.8947V54.2941H74.3255V45.1582H92.4589Z" fill="url(#paint1_linear_203_2027)"/>
<path d="M106.31 45.1582H102.026V50.2993H106.31V45.1582Z" fill="url(#paint2_linear_203_2027)"/>
<path d="M147.431 45.1582H143.718V46.0146H147.431V45.1582Z" fill="url(#paint3_linear_203_2027)"/>
<path d="M130.01 45.1582V47.2992H123.872V54.2941H119.587V47.2992H116.162V45.1582H130.01Z" fill="url(#paint4_linear_203_2027)"/>
<path d="M137.151 38.8762V41.8411L130.01 39.86V45.1583H116.162V41.0145L106.31 42.608V45.1583H102.026V39.4453L99.1014 38.8762H137.151Z" fill="url(#paint5_linear_203_2027)"/>
<path d="M165.686 45.1583H157.711V43.8737H154.285V39.8762H153.429V39.1635H148.147V39.8762H147.434V45.1583H143.721V39.8762H142.008V38.8762H165.524C166.689 40.7326 166.743 43.1609 165.689 45.1583H165.686Z" fill="url(#paint6_linear_203_2027)"/>
<path d="M92.4589 38.8762H74.3255V45.1583H92.4589V38.8762Z" fill="url(#paint7_linear_203_2027)"/>
<path d="M165.521 38.8762C165.201 38.448 164.797 37.8653 164.31 37.4398L157.502 31.5263C156.372 30.5425 154.924 30.0222 153.426 30.0222H65.4335C65.2303 30.0222 65.0297 30.033 64.8319 30.052C60.5553 18.8375 50.4899 10.9619 38.7578 10.9619C23.1448 10.9619 10.4858 24.9082 10.4858 42.1093C10.4858 59.3105 23.1448 73.2568 38.7578 73.2568C50.4574 73.2568 60.4957 65.4272 64.794 54.2642C65.0053 54.2859 65.2167 54.2968 65.4335 54.2968H68.0434V39.4453L70.0299 38.8762L74.3254 37.4452V38.8762H92.4589V37.4452L99.1014 38.8762H137.151V36.8761H137.864V36.0197H141.149V36.8761H142.005V38.8762H165.521ZM54.9074 38.5266C54.8993 38.5455 54.883 38.5645 54.8803 38.5862C54.8478 38.9249 54.7123 39.2285 54.5578 39.5239C54.3573 39.9114 54.0917 40.2529 53.8207 40.5917C53.5849 40.8871 53.36 41.1933 53.1377 41.4968C52.9914 41.7001 52.8532 41.9088 52.7095 42.112C52.3735 42.5917 51.9588 42.9874 51.4602 43.2964C51.1485 43.4915 50.8423 43.6948 50.5414 43.9007C50.2813 44.0769 50.0482 44.2801 49.8368 44.5132C49.517 44.8655 49.3056 45.2721 49.2216 45.7463C49.1403 46.2125 49.1511 46.6786 49.2216 47.1393C49.3083 47.7003 49.414 48.2559 49.5197 48.8115C49.6173 49.3372 49.6986 49.8657 49.6661 50.4023C49.639 50.8739 49.5143 51.3129 49.2324 51.695C49.0834 51.8956 48.9208 52.088 48.7419 52.2615C48.498 52.4945 48.2351 52.7113 47.9777 52.9281C47.731 53.1341 47.5711 53.3862 47.5305 53.7032C47.5061 53.8902 47.5007 54.0799 47.4953 54.2669C47.4898 54.5244 47.5061 54.7792 47.498 55.0339C47.4844 55.4784 47.3191 55.8551 46.9641 56.1369C46.8231 56.2453 46.6876 56.3619 46.5467 56.4676C46.0616 56.8307 45.7147 57.2941 45.4816 57.8524C45.3786 58.1045 45.2702 58.3538 45.1591 58.6004C45.0047 58.9446 44.8068 59.2563 44.5412 59.5246C43.9585 60.1154 43.2566 60.4948 42.4409 60.6439C41.9829 60.7279 41.5167 60.7604 41.0641 60.8769C40.8338 60.9338 40.5953 60.9691 40.3622 61.0124H39.9963C39.9747 61.0043 39.9557 60.9908 39.934 60.988C39.4679 60.9311 39.1508 60.6628 38.9448 60.259C38.8391 60.0449 38.7443 59.8254 38.6603 59.6005C38.5573 59.3132 38.4407 59.0313 38.2836 58.7685C38.0505 58.3809 37.7632 58.034 37.4434 57.7142C37.1778 57.4486 37.0233 57.1261 36.9962 56.7548C36.9719 56.4703 36.961 56.1884 36.9691 55.9039C36.9827 55.2968 36.8336 54.7385 36.5355 54.2127C36.3865 53.9553 36.2239 53.7005 36.0775 53.4376C35.9366 53.1829 35.7929 52.9227 35.6764 52.6544C35.4948 52.2262 35.4488 51.7763 35.5192 51.3129C35.587 50.8766 35.7306 50.4619 35.8743 50.0473C36.0125 49.6543 36.1561 49.2641 36.2754 48.863C36.4217 48.367 36.4596 47.8575 36.3241 47.3507C36.2184 46.9388 36.0098 46.5783 35.7496 46.2504C35.5707 46.0228 35.3756 45.8059 35.194 45.581C35.0287 45.375 34.8607 45.1664 34.7089 44.9468C34.4894 44.6352 34.343 44.2883 34.2834 43.9061C34.2428 43.6378 34.2021 43.3695 34.1587 43.1012C34.1073 42.7923 34.0449 42.4888 33.8986 42.2096C33.7197 41.8654 33.4433 41.654 33.0611 41.589C32.9446 41.57 32.8281 41.5592 32.7115 41.5565C32.53 41.5511 32.3457 41.5565 32.1614 41.5565C31.7223 41.5565 31.3158 41.4589 30.9662 41.1689C30.8226 41.047 30.6546 40.9548 30.4892 40.8627C30.0529 40.6188 29.5922 40.5808 29.1233 40.7543C28.8984 40.8356 28.6816 40.9386 28.4702 41.0443C27.9065 41.3261 27.3184 41.4454 26.6924 41.3749C26.2615 41.3234 25.8333 41.2665 25.4023 41.215C25.0663 41.1716 24.7275 41.1418 24.3942 41.093C23.7329 40.9955 23.2478 40.654 22.9687 40.0442C22.7654 39.6025 22.4754 39.2285 22.1394 38.8816C21.8927 38.6268 21.6461 38.3721 21.4076 38.1065C21.1935 37.8653 21.0174 37.5889 20.9198 37.2799C20.7464 36.727 20.5838 36.1742 20.5052 35.5969C20.4943 35.5292 20.4645 35.4614 20.4428 35.3937V34.8598C20.4645 34.8029 20.4943 34.7486 20.5052 34.689C20.5431 34.4126 20.6298 34.1497 20.7328 33.8923C20.8033 33.7107 20.8683 33.5264 20.9144 33.3367C21.0119 32.9383 21.0987 32.5372 21.18 32.1334C21.3317 31.3691 21.703 30.7377 22.2993 30.2363C22.4212 30.136 22.535 30.0303 22.6543 29.9301C23.0364 29.613 23.3752 29.2552 23.676 28.8596C24.1503 28.2308 24.6327 27.6048 25.1205 26.9841C25.6164 26.3554 26.1856 25.808 26.8577 25.3662C27.1964 25.1413 27.5569 25.041 27.9607 25.0708C28.5759 25.1115 29.1911 25.1277 29.809 25.0545C30.3998 24.9841 30.9825 24.8784 31.5353 24.6399C31.7305 24.5586 31.9229 24.4746 32.118 24.396C32.4188 24.274 32.7224 24.1738 33.0449 24.1304C33.1479 24.1168 33.2536 24.0979 33.3566 24.0816H33.5896C33.6492 24.0952 33.7089 24.1114 33.7685 24.1168C34.6195 24.2117 35.0883 24.7754 35.0314 25.6291C35.0206 25.7836 35.0151 25.938 35.0233 26.0952C35.0314 26.3662 35.1669 26.5641 35.4271 26.6481C35.587 26.7023 35.7577 26.7321 35.9285 26.7538C36.1669 26.7836 36.4054 26.7944 36.6439 26.8188C36.9149 26.8486 37.1616 26.9354 37.3784 27.1061C37.4949 27.201 37.6114 27.2931 37.7361 27.3798C37.8554 27.4693 37.98 27.5533 38.1101 27.6319C38.4272 27.8216 38.747 27.8053 39.0505 27.6021C39.2023 27.4991 39.3405 27.3771 39.4787 27.2579C39.6359 27.1251 39.785 26.9814 39.9449 26.8541C40.1996 26.6481 40.4977 26.5532 40.8256 26.5478C41.1156 26.5451 41.3894 26.6183 41.6468 26.7402C41.9016 26.8622 42.1536 26.995 42.3975 27.1386C42.9314 27.4557 43.5114 27.6617 44.113 27.8053C44.384 27.8731 44.6578 27.9191 44.9369 27.8541C45.0561 27.827 45.1754 27.7972 45.2946 27.7674C45.5765 27.6942 45.861 27.6644 46.151 27.7213C46.7093 27.8297 47.0833 28.2416 47.1402 28.8081C47.1673 29.1008 47.1294 29.3853 47.0806 29.6699C47.0101 30.0737 47.0508 30.4558 47.2486 30.819C47.3408 30.9843 47.4248 31.155 47.5278 31.3095C47.9235 31.903 48.2243 32.5372 48.4628 33.2039C48.4953 33.2987 48.5278 33.3936 48.5712 33.4857C48.7419 33.8624 48.9045 34.25 49.0942 34.6186C49.33 35.0766 49.6661 35.4479 50.1051 35.727C50.2027 35.7893 50.2975 35.8598 50.3924 35.9276C50.658 36.1091 50.8721 36.3395 51.0401 36.6132C51.1268 36.7596 51.2108 36.9113 51.3111 37.0522C51.4168 37.2094 51.5279 37.3639 51.6526 37.5021C51.8423 37.7135 52.0835 37.8409 52.368 37.849C52.5171 37.8544 52.6716 37.8436 52.8152 37.8111C53.1702 37.7217 53.5226 37.616 53.8776 37.5238C54.0212 37.4859 54.1703 37.4534 54.3166 37.4425C54.631 37.4154 54.8045 37.5482 54.883 37.8544C54.8858 37.8707 54.8993 37.8815 54.9074 37.8951V38.5293V38.5266Z" fill="url(#paint8_linear_203_2027)"/>
<path d="M73.7943 41.0144H68.5827V41.6811H73.7943V41.0144Z" fill="url(#paint9_linear_203_2027)"/>
<path d="M73.7943 42.2287H68.5827V42.8953H73.7943V42.2287Z" fill="url(#paint10_linear_203_2027)"/>
<path d="M73.7943 43.4428H68.5827V44.1095H73.7943V43.4428Z" fill="url(#paint11_linear_203_2027)"/>
<path d="M73.7943 44.6569H68.5827V45.1583H73.7943V44.6569Z" fill="url(#paint12_linear_203_2027)"/>
<path d="M81.0032 49.6787H79.9083V51.0148H81.0032V49.6787Z" fill="white"/>
<path d="M83.1875 51.6761H82.0926V53.0122H83.1875V51.6761Z" fill="white"/>
<path d="M87.4099 48.199H85.2201V49.5351H87.4099V48.199Z" fill="white"/>
<path d="M109.476 45.1582H107.286V46.0201H109.476V45.1582Z" fill="white"/>
<path d="M118.818 48.8657H116.628V50.2018H118.818V48.8657Z" fill="white"/>
<path d="M109.476 44.684H107.286V45.1556H109.476V44.684Z" fill="white"/>
<path d="M113.487 43.1907H111.297V44.5268H113.487V43.1907Z" fill="white"/>
<path d="M95.0091 40.1092H93.0551V41.0117H95.0091V40.1092Z" fill="white"/>
<path d="M95.0091 43.8573H93.0551V44.7598H95.0091V43.8573Z" fill="white"/>
<path d="M97.2639 42.1094H95.3072V43.0118H97.2639V42.1094Z" fill="white"/>
<path d="M139.002 37.5808H137.645V38.5754H139.002V37.5808Z" fill="white"/>
<path d="M129.623 49.7682H124.411V50.3454H129.623V49.7682Z" fill="white"/>
<path d="M129.623 51.096H124.411V51.6733H129.623V51.096Z" fill="white"/>
<path d="M134.347 48.3697H132.989V49.3643H134.347V48.3697Z" fill="white"/>
<path d="M136.726 45.1582H135.368V45.8493H136.726V45.1582Z" fill="white"/>
<path d="M153.044 45.1582H150.854V46.0201H153.044V45.1582Z" fill="white"/>
<path d="M150.431 41.4399H148.241V42.776H150.431V41.4399Z" fill="white"/>
<path d="M153.044 44.684H150.854V45.1556H153.044V44.684Z" fill="white"/>
<path d="M132.406 43.3614H131.048V44.356H132.406V43.3614Z" fill="white"/>
<path d="M136.726 44.8547H135.368V45.1582H136.726V44.8547Z" fill="white"/>
<path d="M141.236 39.3613H139.878V40.3559H141.236V39.3613Z" fill="white"/>
<path d="M95.0091 40.1095H93.0551V41.012H95.0091V40.1095Z" fill="url(#paint13_linear_203_2027)"/>
<path d="M97.2639 42.1096H95.3072V43.012H97.2639V42.1096Z" fill="url(#paint14_linear_203_2027)"/>
<path d="M95.0091 43.8577H93.0551V44.7602H95.0091V43.8577Z" fill="url(#paint15_linear_203_2027)"/>
<path d="M118.817 48.866H116.628V50.2021H118.817V48.866Z" fill="url(#paint16_linear_203_2027)"/>
<path d="M109.476 44.6842H107.286V46.0203H109.476V44.6842Z" fill="url(#paint17_linear_203_2027)"/>
<path d="M113.487 43.191H111.297V44.5271H113.487V43.191Z" fill="url(#paint18_linear_203_2027)"/>
<path d="M150.431 41.4402H148.241V42.7763H150.431V41.4402Z" fill="url(#paint19_linear_203_2027)"/>
<path d="M153.044 44.6842H150.854V46.0203H153.044V44.6842Z" fill="url(#paint20_linear_203_2027)"/>
<path d="M87.4099 48.1993H85.2202V49.5354H87.4099V48.1993Z" fill="url(#paint21_linear_203_2027)"/>
<path d="M81.0032 49.679H79.9083V51.0151H81.0032V49.679Z" fill="url(#paint22_linear_203_2027)"/>
<path d="M83.1876 51.6763H82.0927V53.0124H83.1876V51.6763Z" fill="url(#paint23_linear_203_2027)"/>
<path d="M129.623 49.7685H124.411V50.3457H129.623V49.7685Z" fill="url(#paint24_linear_203_2027)"/>
<path d="M129.623 51.0964H124.411V51.6737H129.623V51.0964Z" fill="url(#paint25_linear_203_2027)"/>
<path d="M132.406 43.3617H131.048V44.3563H132.406V43.3617Z" fill="url(#paint26_linear_203_2027)"/>
<path d="M139.003 37.581H137.645V38.5756H139.003V37.581Z" fill="url(#paint27_linear_203_2027)"/>
<path d="M141.236 39.3615H139.878V40.3561H141.236V39.3615Z" fill="url(#paint28_linear_203_2027)"/>
<path d="M136.726 44.8549H135.368V45.8495H136.726V44.8549Z" fill="url(#paint29_linear_203_2027)"/>
<path d="M134.346 48.37H132.989V49.3646H134.346V48.37Z" fill="url(#paint30_linear_203_2027)"/>
<path d="M73.7943 41.0146H68.5827V41.6813H73.7943V41.0146Z" fill="url(#paint31_linear_203_2027)"/>
<path d="M73.7943 42.2289H68.5827V42.8955H73.7943V42.2289Z" fill="url(#paint32_linear_203_2027)"/>
<path d="M73.7943 43.443H68.5827V44.1097H73.7943V43.443Z" fill="url(#paint33_linear_203_2027)"/>
<path d="M73.7943 44.6571H68.5827V45.3238H73.7943V44.6571Z" fill="url(#paint34_linear_203_2027)"/>
</g>
<path d="M68.0677 59.7389H70.4418V73.0402H68.0677V59.7389Z" fill="white"/>
<path d="M89.521 59.4515V73.0428H87.147V65.6658L82.1251 72.8206H82.1061L77.0762 65.6577V73.0428H74.7021V59.4515H74.881L82.117 69.124L89.3449 59.4515H89.5237H89.521Z" fill="white"/>
<path d="M108.6 59.4515V73.0428H106.226V65.6658L101.204 72.8206H101.185L96.1554 65.6577V73.0428H93.7814V59.4515H93.9602L101.196 69.124L108.424 59.4515H108.603H108.6Z" fill="white"/>
<path d="M112.137 66.4084C112.137 62.6116 115.647 59.5085 119.956 59.5085C124.265 59.5085 127.785 62.6116 127.785 66.4084C127.785 70.2053 124.257 73.2569 119.948 73.2569C115.639 73.2569 112.137 70.1701 112.137 66.4084ZM125.381 66.3922C125.381 63.7606 122.931 61.6142 119.948 61.6142C116.964 61.6142 114.533 63.7606 114.533 66.3922C114.533 69.0237 116.964 71.1457 119.948 71.1457C122.931 71.1457 125.381 69.0074 125.381 66.3922Z" fill="white"/>
<path d="M140.04 61.812H135.986V73.0428H133.601V61.812H129.547V59.7415H140.04V61.812Z" fill="white"/>
<path d="M145.65 61.7958V65.2051H151.377V67.2838H145.65V70.9641H152.287V73.0428H143.276V59.7415H152.287V61.7958H145.65Z" fill="white"/>
<path d="M156.103 59.7389H161.163C164.093 59.7389 166.486 61.7119 166.486 64.1293C166.486 66.5467 164.093 68.4275 161.163 68.4275H158.48V73.0402H156.106V59.7389H156.103ZM164.109 64.113C164.109 62.842 162.786 61.8094 161.16 61.8094H158.477V66.357L161.16 66.3651C162.784 66.3733 164.109 65.357 164.109 64.113Z" fill="white"/>
<defs>
<filter id="filter0_d_203_2027" x="0.0458403" y="0.521914" width="190.755" height="97.0948" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
<feFlood flood-opacity="0" result="BackgroundImageFix"/>
<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
<feOffset dx="6.96" dy="6.96"/>
<feGaussianBlur stdDeviation="8.7"/>
<feColorMatrix type="matrix" values="0 0 0 0 0.137255 0 0 0 0 0.121569 0 0 0 0 0.12549 0 0 0 0.75 0"/>
<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_203_2027"/>
<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_203_2027" result="shape"/>
</filter>
<linearGradient id="paint0_linear_203_2027" x1="157.71" y1="48.8305" x2="165.686" y2="48.8305" gradientUnits="userSpaceOnUse">
<stop stop-color="#BE8C2C"/>
<stop offset="0.3" stop-color="#F8D255"/>
<stop offset="0.74" stop-color="#FBD552"/>
<stop offset="1" stop-color="#E2C147"/>
</linearGradient>
<linearGradient id="paint1_linear_203_2027" x1="74.3255" y1="49.7275" x2="92.4589" y2="49.7275" gradientUnits="userSpaceOnUse">
<stop stop-color="#BE8C2C"/>
<stop offset="0.3" stop-color="#F8D255"/>
<stop offset="0.74" stop-color="#FBD552"/>
<stop offset="1" stop-color="#E2C147"/>
</linearGradient>
<linearGradient id="paint2_linear_203_2027" x1="102.026" y1="47.7274" x2="106.31" y2="47.7274" gradientUnits="userSpaceOnUse">
<stop stop-color="#BE8C2C"/>
<stop offset="0.3" stop-color="#F8D255"/>
<stop offset="0.74" stop-color="#FBD552"/>
<stop offset="1" stop-color="#E2C147"/>
</linearGradient>
<linearGradient id="paint3_linear_203_2027" x1="143.718" y1="45.5864" x2="147.431" y2="45.5864" gradientUnits="userSpaceOnUse">
<stop stop-color="#BE8C2C"/>
<stop offset="0.3" stop-color="#F8D255"/>
<stop offset="0.74" stop-color="#FBD552"/>
<stop offset="1" stop-color="#E2C147"/>
</linearGradient>
<linearGradient id="paint4_linear_203_2027" x1="116.162" y1="49.7275" x2="130.01" y2="49.7275" gradientUnits="userSpaceOnUse">
<stop stop-color="#BE8C2C"/>
<stop offset="0.3" stop-color="#F8D255"/>
<stop offset="0.74" stop-color="#FBD552"/>
<stop offset="1" stop-color="#E2C147"/>
</linearGradient>
<linearGradient id="paint5_linear_203_2027" x1="99.1014" y1="42.0172" x2="137.151" y2="42.0172" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint6_linear_203_2027" x1="142.005" y1="10.9619" x2="166.437" y2="10.9619" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint7_linear_203_2027" x1="74.3255" y1="10.9619" x2="92.4589" y2="10.9619" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint8_linear_203_2027" x1="10.4858" y1="42.1093" x2="165.521" y2="42.1093" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint9_linear_203_2027" x1="68.5827" y1="41.3478" x2="73.7943" y2="41.3478" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint10_linear_203_2027" x1="68.5827" y1="42.562" x2="73.7943" y2="42.562" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint11_linear_203_2027" x1="68.5827" y1="43.7761" x2="73.7943" y2="43.7761" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint12_linear_203_2027" x1="68.5827" y1="44.9062" x2="73.7943" y2="44.9062" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint13_linear_203_2027" x1="93.0551" y1="40.5621" x2="95.0091" y2="40.5621" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint14_linear_203_2027" x1="95.3072" y1="42.5621" x2="97.2639" y2="42.5621" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint15_linear_203_2027" x1="93.0551" y1="44.3103" x2="95.0091" y2="44.3103" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint16_linear_203_2027" x1="116.628" y1="49.5354" x2="118.817" y2="49.5354" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint17_linear_203_2027" x1="107.286" y1="45.3536" x2="109.476" y2="45.3536" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint18_linear_203_2027" x1="111.297" y1="43.8577" x2="113.487" y2="43.8577" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint19_linear_203_2027" x1="148.241" y1="42.1096" x2="150.431" y2="42.1096" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint20_linear_203_2027" x1="150.854" y1="45.3536" x2="153.044" y2="45.3536" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint21_linear_203_2027" x1="85.2202" y1="48.8687" x2="87.4072" y2="48.8687" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint22_linear_203_2027" x1="79.9083" y1="50.3457" x2="81.0059" y2="50.3457" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint23_linear_203_2027" x1="82.0927" y1="52.343" x2="83.1876" y2="52.343" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint24_linear_203_2027" x1="124.411" y1="50.0557" x2="129.62" y2="50.0557" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint25_linear_203_2027" x1="124.411" y1="51.3864" x2="129.62" y2="51.3864" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint26_linear_203_2027" x1="131.048" y1="43.8603" x2="132.406" y2="43.8603" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint27_linear_203_2027" x1="137.645" y1="38.0769" x2="139.003" y2="38.0769" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint28_linear_203_2027" x1="139.878" y1="39.8602" x2="141.236" y2="39.8602" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint29_linear_203_2027" x1="135.368" y1="45.3508" x2="136.726" y2="45.3508" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint30_linear_203_2027" x1="132.989" y1="48.8659" x2="134.346" y2="48.8659" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint31_linear_203_2027" x1="68.5827" y1="41.348" x2="73.7943" y2="41.348" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint32_linear_203_2027" x1="68.5827" y1="42.5622" x2="73.7943" y2="42.5622" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint33_linear_203_2027" x1="68.5827" y1="43.7763" x2="73.7943" y2="43.7763" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
<linearGradient id="paint34_linear_203_2027" x1="68.5827" y1="44.9904" x2="73.7943" y2="44.9904" gradientUnits="userSpaceOnUse">
<stop stop-color="#FBF173"/>
<stop offset="0.29" stop-color="#E7B942"/>
<stop offset="0.65" stop-color="#FDEC68"/>
<stop offset="1" stop-color="#E4B948"/>
</linearGradient>
</defs>
</svg>

</div>
<div class="login-main-content">
    <div class="card-header">
                    <h3>Account that leads you to your</h3>
                    <h1 class="login-main-heading">Dream Home</h1>
                </div>
            <div class="login-main-container">
                  <div class="heading">
                    <h4>Login</h4>
                    <p>Hey, Please fill in your credentials to access your account.</p>
                </div>
                
                 @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="col-field-main">
                            <!--<label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>-->

                            <div class="col-field">
                              

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-field-main">
                            <!--<label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>-->

                            <div class="col-field">
                               

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <div class="login-btn register_link">
                       @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ url('forgot-password') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif 
                            </div>

                        <div class="login-btn">
                            <div class="button">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                              
                            </div>
                        </div>
                        <!--<div class="or-txt-small">-->
                        <!--   <span> or </span>-->
                        <!--</div>-->
                        <!--<a href="{{ url('auth/google') }}" class="btn btn-secondary btn-block">-->
                        <!--  <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                        <!--    <path d="M10.329 8.42212V12.2948H15.8207C15.5795 13.5403 14.8559 14.5949 13.7705 15.3039L17.0822 17.8221C19.0117 16.0768 20.1249 13.5131 20.1249 10.4677C20.1249 9.75859 20.06 9.07671 19.9393 8.42223L10.329 8.42212Z" fill="#4285F4"/>-->
                        <!--    <path d="M4.61039 12.1437L3.86349 12.704L1.21967 14.7221C2.89869 17.9857 6.33998 20.2403 10.3288 20.2403C13.0838 20.2403 15.3936 19.3494 17.082 17.8222L13.7703 15.304C12.8612 15.904 11.7017 16.2676 10.3288 16.2676C7.67577 16.2676 5.42167 14.5131 4.61456 12.1495L4.61039 12.1437Z" fill="#34A853"/>-->
                        <!--    <path d="M1.21948 5.75854C0.523783 7.10394 0.124939 8.62214 0.124939 10.2403C0.124939 11.8584 0.523783 13.3766 1.21948 14.722C1.21948 14.7311 4.6147 12.1402 4.6147 12.1402C4.41062 11.5402 4.28999 10.9039 4.28999 10.2402C4.28999 9.57646 4.41062 8.94014 4.6147 8.34015L1.21948 5.75854Z" fill="#FBBC05"/>-->
                        <!--    <path d="M10.329 4.22219C11.8318 4.22219 13.1676 4.73127 14.2344 5.71309L17.1564 2.8495C15.3846 1.23135 13.0841 0.240387 10.329 0.240387C6.34019 0.240387 2.89869 2.48583 1.21967 5.75856L4.61478 8.34037C5.42178 5.97672 7.67598 4.22219 10.329 4.22219Z" fill="#EA4335"/>-->
                        <!--    </svg>-->

                        <!-- Login with Google-->
                        <!--</a>-->

                        <!--<div class="remember-pswd-btn">-->
                        <!--  @if (Route::has('password.request'))-->
                        <!--            <a class="btn btn-link" href="{{ route('register') }}">-->
                        <!--                Don’t Have Account? <b>Create One.</b>-->
                        <!--            </a>-->
                        <!--        @endif-->
                        <!--    </div>-->
                    </form>
                </div>
            </div>
</div>
</div>
</main>
</body>
</html>

