<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO Website</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Khand:wght@500;700&family=Noto+Sans+Devanagari:wght@400;600;800&family=Rozha+One&family=Yatra+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/style.css">

    <style>
        /* Base modern typography and smooth scroll */
        html { scroll-behavior: smooth; }
        
        body {
            /* Clean, high-readability bold Devanagari font for descriptions and layouts */
            font-family: 'Noto Sans Devanagari', sans-serif;
            background-color: #ffffff;
            color: #1a1a1a;
            margin: 0;
            padding: 0;
            top: 0 !important; /* Google Translate के डिफ़ॉल्ट टॉप मार्जिन को रीसेट करने के लिए */
        }
        
        /* Traditional, sharp, thick-header look for mainstream Hindi titles */
        h1, h2, h3, .brand-font { 
            font-family: 'Khand', sans-serif; 
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        /* Specialized artistic traditional highlight style if used */
        .traditional-accent {
            font-family: 'Rozha One', serif;
        }

        /* ----------------------------------------------------
           PREMIUM CORPORATE TRANSLATOR OVERRIDES (CUSTOM STYLING)
           ---------------------------------------------------- */
        
        /* Google Translate के अनचाहे ऊपरी फ्रेम और टूलटिप बैनर को छुपाने के लिए */
        .skiptranslate iframe, .goog-te-banner-frame, #goog-gt-tt, .goog-te-balloon-frame { 
            display: none !important; 
        }
        
        body { 
            position: static !important; 
        }

        /* अनुवादक ड्रॉपडाउन को प्रीमियम गोल किनारा (Rounded Smooth Corners) देने के लिए */
        #google_translate_element select {
            background-color: #f9fafb; /* gray-50 */
            border: 1px solid #e5e7eb; /* gray-200 */
            color: #4b5563; /* gray-600 */
            padding: 0.5rem 1rem;
            font-size: 0.75rem; /* text-xs */
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-radius: 9999px; /* full rounded-full */
            outline: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #google_translate_element select:hover {
            border-color: #ff5722;
            color: #111827; /* gray-900 */
        }

        /* Google ब्रांडिंग लोगो को साफ़-सुथरा रखने के लिए छुपाना */
        .goog-te-gadget {
            font-size: 0 !important;
            color: transparent !important;
        }
        .goog-te-gadget span, .goog-te-gadget a {
            display: none !important;
        }
    </style>

    
</head>
<body>