<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ক্লায়েন্ট অনবোর্ডিং ফরম (মাল্টি-স্টেপ)</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">

    <style>


        .hidden { display: none; }
        .invalid { border: 1px solid red; }
        .error-message { color: red; font-size: 14px; margin-top: 4px; }
        .active-step { display: block; }
        .form-step { display: none; }
        .progress-bar { display: flex; list-style: none; padding: 0; }
        .progress-bar .step { margin-right: 10px; padding: 5px; border: 1px solid #ddd; border-radius: 4px; }
        .progress-bar .active { background: #007bff; color: #fff; }
        .progress-bar .completed { background: #28a745; color: #fff; }

        body {
            font-family: 'SolaimanLipi', Arial, sans-serif;
            margin: 0;
            padding: 10px; /* Reduced body padding for mobile */
            background-color: #eef2f7;
            color: #334155;
            line-height: 1.6; /* Slightly adjusted line height */
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 900px;
            margin: 15px auto;
            background-color: #ffffff;
            padding: 20px 25px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1), 0 5px 10px rgba(0,0,0,0.05);
        }
        .form-header h1 {
            font-size: 1.6rem; /* Adjusted for mobile */
            color: #1e40af;
            font-weight: 700;
            margin-bottom: 15px;
            text-align: center;
        }
        .progress-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 0;
            list-style: none;
            background-color: #f0f4f8;
            border-radius: 25px;
            padding: 5px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }
        .progress-bar .step {
            padding: 8px 10px;
            border: none;
            border-radius: 20px;
            color: #4b5563;
            text-align: center;
            flex-grow: 1;
            margin: 0 2px;
            font-size: 0.75em; /* Smaller font for desktop */
            cursor: pointer;
            transition: background-color 0.4s ease, color 0.4s ease, transform 0.2s ease;
            font-weight: 500;
            white-space: nowrap; /* Prevent text wrapping in steps */
            overflow: hidden;
            text-overflow: ellipsis; /* Add ellipsis if text is too long */
        }
        .progress-bar .step .step-text { /* Span for text to hide on mobile */
            display: inline;
        }
        .progress-bar .step.active {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            font-weight: 700;
            transform: scale(1.05);
            box-shadow: 0 2px 5px rgba(59, 130, 246, 0.3);
        }
        .progress-bar .step.completed {
            background-color: #a7f3d0;
            color: #047857;
        }
        .progress-bar .step:not(.active):not(.completed):hover {
            background-color: #e5e7eb;
        }
        .mobile-progress-info { /* For "Step X of Y: Title" on mobile */
            display: none; /* Hidden by default, shown on mobile */
            text-align: center;
            font-size: 0.9rem;
            font-weight: 600;
            color: #1e40af;
            margin-bottom: 15px;
            padding: 8px;
            background-color: #e0e7ff;
            border-radius: 6px;
        }

        .form-step {
            display: none;
            animation: fadeIn 0.5s ease-in-out;
            border: 1px solid #e5e7eb;
            padding: 15px; /* Reduced padding for mobile */
            border-radius: 8px;
            margin-top: 10px;
            background-color: #fdfdff;
        }
        .form-step.active-step {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-step h2.section-title {
            font-size: 1.3rem; /* Adjusted for mobile */
            color: #1e3a8a;
            font-weight: 600;
            border-bottom: 2px solid #60a5fa;
            padding-bottom: 6px;
            margin-top: 0;
            margin-bottom: 18px;
        }
        .form-step h2.section-title i {
            margin-right: 8px;
        }
        .form-step h3.sub-title {
            font-size: 1.1rem; /* Adjusted for mobile */
            color: #111827;
            margin-top: 15px;
            margin-bottom: 10px;
            padding-bottom: 3px;
            border-bottom: 1px dashed #cbd5e1;
        }
        .input-group {
            margin-bottom: 18px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #1f2937;
            font-size: 0.9rem; /* Adjusted for mobile */
        }
        .input-group label i.label-icon {
            margin-right: 6px;
            color: #3b82f6;
            width: 16px;
            text-align: center;
        }
        .input-group input[type="text"],
        .input-group input[type="email"],
        .input-group input[type="tel"],
        .input-group input[type="date"],
        .input-group input[type="url"],
        .input-group textarea,
        .input-group select {
            width: 100%;
            padding: 9px 10px;
            border: 1px solid #b0bec5;
            border-radius: 6px;
            box-sizing: border-box;
            font-family: 'SolaimanLipi', Arial, sans-serif;
            font-size: 0.9rem; /* Adjusted for mobile */
            color: #1f2937;
            background-color: #f8fafc;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .input-group input:focus,
        .input-group textarea:focus,
        .input-group select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2); /* Smaller shadow */
            outline: none;
            background-color: #fff;
        }
        .input-group textarea {
            min-height: 80px;
            resize: vertical;
        }
        .radio-group, .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 8px; /* Reduced gap */
            padding-top: 3px;
        }
        .radio-group label, .checkbox-group label {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 7px 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background-color: #f9fafb;
            font-weight: normal;
            font-size: 0.85rem; /* Adjusted for mobile */
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .radio-group label:hover, .checkbox-group label:hover {
            background-color: #e5e7eb;
            border-color: #9ca3af;
        }
        .radio-group input[type="radio"], .checkbox-group input[type="checkbox"] {
            margin-right: 6px;
            accent-color: #2563eb;
            width: 0.9em;
            height: 0.9em;
        }
        .form-navigation {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-navigation button {
            padding: 9px 20px;
            border-radius: 6px;
            font-size: 0.95rem; /* Adjusted for mobile */
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            border: none;
            display: flex;
            align-items: center;
            gap: 6px;
            font-family: 'SolaimanLipi', Arial, sans-serif;
        }
        .form-navigation button.prev-btn {
            background-color: #6b7280;
            color: white;
        }
        .form-navigation button.prev-btn:hover {
            background-color: #4b5563;
            transform: translateY(-1px);
        }
        .form-navigation button.next-btn,
        .form-navigation button.submit-btn {
            background-color: #2563eb;
            color: white;
        }
        .form-navigation button.next-btn:hover,
        .form-navigation button.submit-btn:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
        }
        .form-navigation button.hidden {
            display: none;
        }
        .form-navigation button:disabled {
            background-color: #d1d5db;
            cursor: not-allowed;
            transform: none;
        }
        .error-message {
            color: #ef4444;
            font-size: 0.8rem; /* Adjusted for mobile */
            margin-top: 3px;
        }
        input.invalid, textarea.invalid, select.invalid {
            border-color: #ef4444 !important;
            background-color: #fee2e2;
        }
        .conditional-field {
            display: none;
            margin-top: 8px;
            padding: 8px;
            background-color: #f9fafb;
            border: 1px dashed #d1d5db;
            border-radius: 4px;
        }
        .add-more-btn {
            background-color: #10b981;
            color: white;
            padding: 5px 10px; /* Compact button */
            font-size: 0.8rem; /* Adjusted for mobile */
            border-radius: 4px;
            cursor: pointer;
            border: none;
            margin-top: 6px;
            transition: background-color 0.3s;
        }
        .add-more-btn:hover {
            background-color: #059669;
        }
        .dynamic-item-group {
            padding: 8px;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            margin-bottom: 8px;
            background-color: #fdfdff;
        }
        .dynamic-item-group input[type="text"], .dynamic-item-group input[type="url"] {
            margin-bottom: 4px;
        }

        /* Mobile specific styles for progress bar and layout */
        @media (max-width: 768px) { /* Tablet and below */
            .container {
                padding: 20px 20px;
            }
            .form-header h1 {
                font-size: 1.5rem;
            }
            .progress-bar .step {
                font-size: 0.7em;
                padding: 7px 8px;
            }
             .progress-bar .step .step-text {
                display: none; /* Hide text on tablet, show only number or icon */
            }
            .progress-bar .step::before { /* Show step number */
                content: attr(data-step);
                font-weight: bold;
            }
            .progress-bar .step.active::before {
                 content: attr(data-step); /* Ensure active step number is also shown */
            }
             .progress-bar .step.active .step-text { /* Optionally show text for active step if space allows */
                display: inline; /* Or none, depending on preference */
                margin-left: 4px;
            }

        }

        @media (max-width: 640px) { /* Mobile specific */
            body {
                padding: 5px;
            }
            .container {
                margin: 10px auto;
                padding: 15px;
            }
            .form-header h1 {
                font-size: 1.4rem;
            }
            .progress-bar {
                display: none; /* Hide the default progress bar */
            }
            .mobile-progress-info {
                display: block; /* Show the mobile specific progress info */
            }
            .form-step h2.section-title {
                font-size: 1.2rem;
            }
            .form-step h3.sub-title {
                font-size: 1rem;
            }
            .input-group label {
                font-size: 0.85rem;
            }
            .input-group input, .input-group textarea, .input-group select {
                font-size: 0.85rem;
                padding: 8px 10px;
            }
            .radio-group label, .checkbox-group label {
                font-size: 0.8rem;
                padding: 6px 8px;
            }
            .form-navigation button {
                font-size: 0.9rem;
                padding: 8px 16px;
            }
            .add-more-btn {
                font-size: 0.75rem;
                padding: 4px 8px;
            }
        }
    </style>
</head>
