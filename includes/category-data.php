<?php

$wordscompare_categories = [
    'developer-tools' => [
        'title' => 'Developer Tools',
        'slug' => 'developer-tools',
        'intro' => 'WordsCompare helps developers format data, inspect payloads, decode tokens, validate output, and handle routine engineering tasks directly in the browser without leaving the workflow.',
        'groups' => [
            [
                'title' => 'JSON & Data',
                'tools' => [
                    ['title' => 'JSON Formatter', 'slug' => 'json-formatter', 'description' => 'Beautify, validate, and inspect JSON payloads for APIs and configuration files.'],
                    ['title' => 'JSON Viewer', 'slug' => 'json-viewer', 'description' => 'Read and explore structured JSON output in an easy-to-scan layout.'],
                    ['title' => 'JSON to PDF', 'slug' => 'json-to-pdf', 'description' => 'Turn JSON content into a printable PDF for sharing or documentation.'],
                    ['title' => 'PDF to JSON', 'slug' => 'pdf-to-json', 'description' => 'Extract structured data from PDFs into JSON for downstream use.'],
                ],
            ],
            [
                'title' => 'Encoding & Decoding',
                'tools' => [
                    ['title' => 'Base64 Encoder', 'slug' => 'base64-encoder', 'description' => 'Encode and decode Base64 values for APIs, auth flows, and data exchange.'],
                    ['title' => 'URL Encoder', 'slug' => 'url-encoder', 'description' => 'Convert URLs and query strings into safe encoded values for web requests.'],
                    ['title' => 'JWT Decoder', 'slug' => 'jwt-decoder', 'description' => 'Inspect JWT headers and payloads while debugging authentication and access tokens.'],
                ],
            ],
            [
                'title' => 'Security',
                'tools' => [
                    ['title' => 'Hash Generator', 'slug' => 'hash-generator', 'description' => 'Generate common hashes for verification, checksums, and security testing.'],
                    ['title' => 'Password Generator', 'slug' => 'password-generator', 'description' => 'Create secure random credentials for testing and internal tooling.'],
                ],
            ],
            [
                'title' => 'Web Development',
                'tools' => [
                    ['title' => 'Color Picker', 'slug' => 'color-picker', 'description' => 'Pick HEX, RGB, and HSL values quickly for front-end styling and prototypes.'],
                    ['title' => 'QR Code Generator', 'slug' => 'qr-code-generator', 'description' => 'Create QR codes for URLs, contact details, and quick sharing.'],
                    ['title' => 'HTML to PDF', 'slug' => 'html-to-pdf', 'description' => 'Convert HTML content into a PDF for demos, documentation, and export flows.'],
                    ['title' => 'PDF to HTML', 'slug' => 'pdf-to-html', 'description' => 'Turn PDF output back into HTML for reuse, comparison, or formatting checks.'],
                ],
            ],
            [
                'title' => 'Code Formatting',
                'tools' => [
                    ['title' => 'Case Converter', 'slug' => 'case-converter', 'description' => 'Convert strings between common coding styles such as snake_case and camelCase.'],
                    ['title' => 'Text to Slug', 'slug' => 'text-to-slug', 'description' => 'Transform headings and labels into clean slugs for URLs and content IDs.'],
                ],
            ],
            [
                'title' => 'Text Processing',
                'tools' => [
                    ['title' => 'Text Compare', 'slug' => 'text-comparison', 'description' => 'Compare two text versions and highlight differences for debugging and release checks.'],
                    ['title' => 'Find & Replace Text', 'slug' => 'find-replace-text', 'description' => 'Update repeated values across content blocks and test data quickly.'],
                    ['title' => 'Remove Extra Spaces', 'slug' => 'remove-extra-spaces', 'description' => 'Clean trailing and repeated whitespace from source text before validation.'],
                    ['title' => 'Word Counter', 'slug' => 'word-counter', 'description' => 'Check content length and text metrics for drafts, docs, and QA notes.'],
                    ['title' => 'Reverse Text', 'slug' => 'reverse-text', 'description' => 'Flip strings for edge-case testing and quick validation checks.'],
                ],
            ],
            [
                'title' => 'Date & Time',
                'tools' => [
                    ['title' => 'Age Calculator', 'slug' => 'age-calculator', 'description' => 'Calculate date-based differences and age values for forms, flows, and scheduling checks.'],
                ],
            ],
            [
                'title' => 'Utilities',
                'tools' => [
                    ['title' => 'Unit Converter', 'slug' => 'unit-converter', 'description' => 'Convert common units for calculations and engineering estimates.'],
                ],
            ],
        ],
        'related' => ['qa-tools', 'api-testing-tools', 'json-tools', 'devops-tools'],
    ],
    'qa-tools' => [
        'title' => 'Free QA & Testing Tools',
        'slug' => 'qa-tools',
        'intro' => 'WordsCompare provides browser-based utilities for QA engineers, software testers, automation testers, API testers, and SDET engineers who need quick validation, comparison, and debugging support.',
        'groups' => [
            [
                'title' => 'API Testing',
                'tools' => [
                    ['title' => 'JSON Formatter', 'slug' => 'json-formatter', 'description' => 'Format, prettify, and validate payloads used in API responses and request bodies.'],
                    ['title' => 'JSON Viewer', 'slug' => 'json-viewer', 'description' => 'Review structured JSON output in a readable format for debugging and QA checks.'],
                    ['title' => 'URL Encoder', 'slug' => 'url-encoder', 'description' => 'Prepare query strings, encoded parameters, and URL-safe values for API testing.'],
                    ['title' => 'Base64 Encoder', 'slug' => 'base64-encoder', 'description' => 'Encode and decode request values or payload fragments during API troubleshooting.'],
                    ['title' => 'JWT Decoder', 'slug' => 'jwt-decoder', 'description' => 'Inspect token headers and payloads during authentication and access testing.'],
                ],
            ],
            [
                'title' => 'Test Data',
                'tools' => [
                    ['title' => 'Case Converter', 'slug' => 'case-converter', 'description' => 'Create consistent test inputs for identifiers, field names, and user content.'],
                    ['title' => 'Reverse Text', 'slug' => 'reverse-text', 'description' => 'Generate edge-case content for negative and boundary testing.'],
                    ['title' => 'Word Counter', 'slug' => 'word-counter', 'description' => 'Measure text length, word counts, and content volume for QA validation.'],
                    ['title' => 'Remove Extra Spaces', 'slug' => 'remove-extra-spaces', 'description' => 'Clean test data and format strings before validation or comparison.'],
                ],
            ],
            [
                'title' => 'Automation Testing',
                'tools' => [
                    ['title' => 'Find & Replace Text', 'slug' => 'find-replace-text', 'description' => 'Create fast search-and-replace checks and test dataset transformations.'],
                    ['title' => 'Text Compare', 'slug' => 'text-comparison', 'description' => 'Compare expected versus actual output during script and UI verification.'],
                ],
            ],
            [
                'title' => 'Security / Authentication',
                'tools' => [
                    ['title' => 'Hash Generator', 'slug' => 'hash-generator', 'description' => 'Generate hashes for verification, integrity, and token-related checks.'],
                ],
            ],
        ],
        'related' => ['developer-tools', 'api-testing-tools', 'text-tools', 'json-tools'],
    ],
    'api-testing-tools' => [
        'title' => 'API Testing Tools',
        'slug' => 'api-testing-tools',
        'intro' => 'Tools focused on API payloads, authentication, encoding, and lightweight response checks. Useful for QA engineers, API testers, SDETs, and backend developers who need quick in-browser utilities during debugging and test creation.',
        'groups' => [
            [
                'title' => 'JSON/API Data',
                'tools' => [
                    ['title' => 'JSON Formatter', 'slug' => 'json-formatter', 'description' => 'Beautify, validate, and inspect JSON payloads used by APIs.'],
                    ['title' => 'JSON Viewer', 'slug' => 'json-viewer', 'description' => 'Explore nested JSON objects for quick debugging and verification.'],
                    ['title' => 'JSON to PDF', 'slug' => 'json-to-pdf', 'description' => 'Export JSON responses to PDF for sharing or archival.'],
                    ['title' => 'PDF to JSON', 'slug' => 'pdf-to-json', 'description' => 'Extract structured JSON from PDF reports or API documentation.'],
                ],
            ],
            [
                'title' => 'Authentication',
                'tools' => [
                    ['title' => 'JWT Decoder', 'slug' => 'jwt-decoder', 'description' => 'Decode JWTs to inspect claims, headers, and expiry during auth debugging.'],
                    ['title' => 'Hash Generator', 'slug' => 'hash-generator', 'description' => 'Generate common hashes used in signatures and verification checks.'],
                ],
            ],
            [
                'title' => 'Encoding',
                'tools' => [
                    ['title' => 'Base64 Encoder', 'slug' => 'base64-encoder', 'description' => 'Encode and decode Base64 payload fragments and headers.'],
                    ['title' => 'URL Encoder', 'slug' => 'url-encoder', 'description' => 'Encode query parameters and inspect URL-safe values.'],
                ],
            ],
            [
                'title' => 'HTTP',
                'tools' => [
                    ['title' => 'Text Compare', 'slug' => 'text-comparison', 'description' => 'Compare raw response bodies or header dumps during regression checks.'],
                ],
            ],
            [
                'title' => 'Test Data',
                'tools' => [
                    ['title' => 'Case Converter', 'slug' => 'case-converter', 'description' => 'Generate consistent test keys, identifiers, and field names across systems.'],
                    ['title' => 'Find & Replace Text', 'slug' => 'find-replace-text', 'description' => 'Mutate sample payloads and create variant test inputs quickly.'],
                    ['title' => 'Remove Extra Spaces', 'slug' => 'remove-extra-spaces', 'description' => 'Clean whitespace and formatting before comparing responses.'],
                ],
            ],
            [
                'title' => 'Date & Time',
                'tools' => [
                    ['title' => 'Age Calculator', 'slug' => 'age-calculator', 'description' => 'Convert dates, calculate age, and sanity-check timestamps in payloads.'],
                ],
            ],
        ],
        'related' => ['qa-tools', 'developer-tools', 'json-tools', 'devops-tools'],
    ],
    'devops-tools' => [
        'title' => 'DevOps Tools',
        'slug' => 'devops-tools',
        'intro' => 'Practical DevOps utilities for hashing, format conversion, encoding, and quick operational checks that support release and deployment workflows.',
        'groups' => [
            [
                'title' => 'Operational Utilities',
                'tools' => [
                    ['title' => 'Hash Generator', 'slug' => 'hash-generator', 'description' => 'Generate standard hashes for verification and integrity checks.'],
                    ['title' => 'Base64 Encoder', 'slug' => 'base64-encoder', 'description' => 'Encode and decode values used in configs and integrations.'],
                    ['title' => 'URL Encoder', 'slug' => 'url-encoder', 'description' => 'Prepare and decode query and URL-safe values.'],
                ],
            ],
            [
                'title' => 'Data & Payload Maintenance',
                'tools' => [
                    ['title' => 'JSON Formatter', 'slug' => 'json-formatter', 'description' => 'Normalize JSON for configuration and system payload review.'],
                    ['title' => 'JSON Viewer', 'slug' => 'json-viewer', 'description' => 'Inspect structured values in a readable browser view.'],
                    ['title' => 'JWT Decoder', 'slug' => 'jwt-decoder', 'description' => 'Inspect token payloads used in auth and service configuration.'],
                ],
            ],
        ],
        'related' => ['developer-tools', 'api-testing-tools', 'json-tools', 'qa-tools'],
    ],
    'json-tools' => [
        'title' => 'JSON Tools',
        'slug' => 'json-tools',
        'intro' => 'JSON-focused tools for formatting, validation, comparison, and conversion into other formats used by developers and QA teams.',
        'groups' => [
            [
                'title' => 'Core JSON Utilities',
                'tools' => [
                    ['title' => 'JSON Formatter', 'slug' => 'json-formatter', 'description' => 'Pretty-print and validate JSON data for clean output.'],
                    ['title' => 'JSON Viewer', 'slug' => 'json-viewer', 'description' => 'Read JSON in a structured and readable layout.'],
                    ['title' => 'JSON to PDF', 'slug' => 'json-to-pdf', 'description' => 'Convert JSON data into a PDF document.'],
                    ['title' => 'PDF to JSON', 'slug' => 'pdf-to-json', 'description' => 'Extract readable data from PDF files into JSON.'],
                ],
            ],
            [
                'title' => 'Supporting Tools',
                'tools' => [
                    ['title' => 'Case Converter', 'slug' => 'case-converter', 'description' => 'Normalize field names and identifier casing.'],
                    ['title' => 'Text Compare', 'slug' => 'text-comparison', 'description' => 'Compare JSON output versions or payload diffs.'],
                ],
            ],
        ],
        'related' => ['developer-tools', 'api-testing-tools', 'qa-tools', 'text-tools'],
    ],
    'text-tools' => [
        'title' => 'Text & Content Tools',
        'slug' => 'text-tools',
        'intro' => 'Text and content utilities for editing, cleaning, comparing, and preparing copy for publishing, documentation, and QA review.',
        'groups' => [
            [
                'title' => 'Writing & Cleanup',
                'tools' => [
                    ['title' => 'Case Converter', 'slug' => 'case-converter', 'description' => 'Change capitalization styles for clean copy.'],
                    ['title' => 'Remove Extra Spaces', 'slug' => 'remove-extra-spaces', 'description' => 'Clean up whitespace and formatting issues in text.'],
                    ['title' => 'Reverse Text', 'slug' => 'reverse-text', 'description' => 'Reverse or inspect string content for testing and editing.'],
                    ['title' => 'Find & Replace Text', 'slug' => 'find-replace-text', 'description' => 'Replace repeated values across text blocks.'],
                ],
            ],
            [
                'title' => 'Content Review',
                'tools' => [
                    ['title' => 'Text Compare', 'slug' => 'text-comparison', 'description' => 'Highlight differences between two text versions.'],
                    ['title' => 'Word Counter', 'slug' => 'word-counter', 'description' => 'Check word, sentence, and character counts.'],
                    ['title' => 'Text to Slug', 'slug' => 'text-to-slug', 'description' => 'Convert headings and text into URL-friendly slugs.'],
                ],
            ],
        ],
        'related' => ['qa-tools', 'developer-tools', 'pdf-tools', 'calculators'],
    ],
    'pdf-tools' => [
        'title' => 'PDF Tools',
        'slug' => 'pdf-tools',
        'intro' => 'PDF utilities for editing, conversion, optimization, and document workflows used by people working with PDF files every day.',
        'groups' => [
            [
                'title' => 'Edit & Organize PDF Files',
                'tools' => [
                    ['title' => 'Add Page Number to PDF', 'slug' => 'add-page-number-to-pdf', 'description' => 'Add page numbers to documents for professional output.'],
                    ['title' => 'Add Watermark to PDF', 'slug' => 'add-watermark-to-pdf', 'description' => 'Apply text or image watermarks quickly.'],
                    ['title' => 'Delete PDF Pages', 'slug' => 'delete-pdf-pages', 'description' => 'Remove unnecessary pages from PDFs.'],
                    ['title' => 'Reorder PDF Pages', 'slug' => 'reorder-pdf-pages', 'description' => 'Change PDF page order before finalizing files.'],
                ],
            ],
            [
                'title' => 'Convert & Optimize PDF Files',
                'tools' => [
                    ['title' => 'Compress PDF', 'slug' => 'compress-pdf', 'description' => 'Reduce the file size of PDF documents quickly.'],
                    ['title' => 'Merge PDF', 'slug' => 'merge-pdf', 'description' => 'Combine multiple PDFs into one file.'],
                    ['title' => 'Split PDF', 'slug' => 'split-pdf', 'description' => 'Separate a PDF into smaller documents.'],
                    ['title' => 'Flatten PDF', 'slug' => 'flatten-pdf', 'description' => 'Convert interactive PDF content into a static flattened file.'],
                ],
            ],
            [
                'title' => 'Convert PDF to Other Formats',
                'tools' => [
                    ['title' => 'PDF to Word', 'slug' => 'pdf-to-word', 'description' => 'Convert PDFs into editable Word documents.'],
                    ['title' => 'PDF to Excel', 'slug' => 'pdf-to-excel', 'description' => 'Extract table data into spreadsheet-friendly format.'],
                    ['title' => 'PDF to JSON', 'slug' => 'pdf-to-json', 'description' => 'Convert structured PDF data to JSON.'],
                    ['title' => 'PDF to HTML', 'slug' => 'pdf-to-html', 'description' => 'Extract PDF content into HTML structure.'],
                ],
            ],
        ],
        'related' => ['text-tools', 'developer-tools', 'json-tools', 'calculators'],
    ],
    'calculators' => [
        'title' => 'Calculators',
        'slug' => 'calculators',
        'intro' => 'General purpose calculators for financial planning, productivity, health, and everyday decision-making tasks.',
        'groups' => [
            [
                'title' => 'Financial Calculators',
                'tools' => [
                    ['title' => 'EMI Calculator', 'slug' => 'emi-calculator', 'description' => 'Estimate monthly EMI values for loans.'],
                    ['title' => 'GST Calculator', 'slug' => 'gst-calculator', 'description' => 'Calculate GST totals across pricing scenarios.'],
                    ['title' => 'CAGR Calculator', 'slug' => 'cagr-calculator', 'description' => 'Measure annual growth over time.'],
                    ['title' => 'Discount Calculator', 'slug' => 'discount-calculator', 'description' => 'Find final price and savings instantly.'],
                ],
            ],
            [
                'title' => 'Savings & Planning',
                'tools' => [
                    ['title' => 'Compound Interest Calculator', 'slug' => 'compound-interest-calculator', 'description' => 'Project returns using compound growth assumptions.'],
                    ['title' => 'PPF Calculator', 'slug' => 'ppf-calculator', 'description' => 'Estimate public provident fund growth.'],
                    ['title' => 'SIP Calculator', 'slug' => 'sip-calculator', 'description' => 'Project monthly investment growth.'],
                    ['title' => 'Retirement Calculator', 'slug' => 'retirement-calculator', 'description' => 'Model retirement savings toward a life goal.'],
                ],
            ],
            [
                'title' => 'Health & Everyday Use',
                'tools' => [
                    ['title' => 'BMI Calculator', 'slug' => 'bmi-calculator', 'description' => 'Check Body Mass Index for health tracking.'],
                    ['title' => 'Age Calculator', 'slug' => 'age-calculator', 'description' => 'Calculate age from date of birth.'],
                    ['title' => 'Unit Converter', 'slug' => 'unit-converter', 'description' => 'Convert between common measurement units.'],
                    ['title' => 'Simple Calculator', 'slug' => 'simple-calculator', 'description' => 'Use a basic arithmetic calculator for everyday tasks.'],
                ],
            ],
        ],
        'related' => ['pdf-tools', 'text-tools', 'developer-tools', 'qa-tools'],
    ],
    'converters' => [
        'title' => 'Converters',
        'slug' => 'converters',
        'intro' => 'Convert documents, data, text, and measurement units between commonly used formats and values.',
        'groups' => [
            [
                'title' => 'Text & Measurement',
                'tools' => [
                    ['title' => 'Case Converter', 'slug' => 'case-converter', 'description' => 'Convert text between uppercase, lowercase, title case, and other styles.'],
                    ['title' => 'Text to Slug', 'slug' => 'text-to-slug', 'description' => 'Convert text into a clean URL-friendly slug.'],
                    ['title' => 'Unit Converter', 'slug' => 'unit-converter', 'description' => 'Convert common units of measurement.'],
                ],
            ],
            [
                'title' => 'Documents to PDF',
                'tools' => [
                    ['title' => 'CSV to PDF', 'slug' => 'csv-to-pdf', 'description' => 'Convert CSV files into PDF documents.'],
                    ['title' => 'DWG to PDF', 'slug' => 'dwg-to-pdf', 'description' => 'Convert DWG drawings into PDF documents.'],
                    ['title' => 'EPUB to PDF', 'slug' => 'epub-to-pdf', 'description' => 'Convert EPUB ebooks into PDF documents.'],
                    ['title' => 'Excel to PDF', 'slug' => 'excel-to-pdf', 'description' => 'Convert spreadsheets into PDF documents.'],
                    ['title' => 'HTML to PDF', 'slug' => 'html-to-pdf', 'description' => 'Convert HTML content into PDF documents.'],
                    ['title' => 'JPG to PDF', 'slug' => 'jpg-to-pdf', 'description' => 'Convert JPG images into PDF documents.'],
                    ['title' => 'JSON to PDF', 'slug' => 'json-to-pdf', 'description' => 'Convert JSON data into a PDF document.'],
                    ['title' => 'Markdown to PDF', 'slug' => 'markdown-to-pdf', 'description' => 'Convert Markdown documents into PDF files.'],
                    ['title' => 'PNG to PDF', 'slug' => 'png-to-pdf', 'description' => 'Convert PNG images into PDF documents.'],
                    ['title' => 'PowerPoint to PDF', 'slug' => 'ppt-to-pdf', 'description' => 'Convert PowerPoint presentations into PDF files.'],
                    ['title' => 'Text to PDF', 'slug' => 'text-to-pdf', 'description' => 'Convert plain text into a PDF document.'],
                    ['title' => 'WebP to PDF', 'slug' => 'webp-to-pdf', 'description' => 'Convert WebP images into PDF documents.'],
                    ['title' => 'Word to PDF', 'slug' => 'word-to-pdf', 'description' => 'Convert Word documents into PDF files.'],
                    ['title' => 'XML to PDF', 'slug' => 'xml-to-pdf', 'description' => 'Convert XML data into a PDF document.'],
                ],
            ],
            [
                'title' => 'PDF to Other Formats',
                'tools' => [
                    ['title' => 'PDF to CSV', 'slug' => 'pdf-to-csv', 'description' => 'Convert PDF table data into CSV format.'],
                    ['title' => 'PDF to EPUB', 'slug' => 'pdf-to-epub', 'description' => 'Convert PDF documents into EPUB ebooks.'],
                    ['title' => 'PDF to Excel', 'slug' => 'pdf-to-excel', 'description' => 'Convert PDF content into an Excel spreadsheet.'],
                    ['title' => 'PDF to HTML', 'slug' => 'pdf-to-html', 'description' => 'Convert PDF content into HTML.'],
                    ['title' => 'PDF to JPG', 'slug' => 'pdf-to-jpg', 'description' => 'Convert PDF pages into JPG images.'],
                    ['title' => 'PDF to JSON', 'slug' => 'pdf-to-json', 'description' => 'Convert structured PDF data into JSON.'],
                    ['title' => 'PDF to Markdown', 'slug' => 'pdf-to-markdown', 'description' => 'Convert PDF text into Markdown format.'],
                    ['title' => 'PDF to PNG', 'slug' => 'pdf-to-png', 'description' => 'Convert PDF pages into PNG images.'],
                    ['title' => 'PDF to PowerPoint', 'slug' => 'pdf-to-ppt', 'description' => 'Convert PDF documents into PowerPoint presentations.'],
                    ['title' => 'PDF to Text', 'slug' => 'pdf-to-text', 'description' => 'Extract and convert PDF content into plain text.'],
                    ['title' => 'PDF to WebP', 'slug' => 'pdf-to-webp', 'description' => 'Convert PDF pages into WebP images.'],
                    ['title' => 'PDF to Word', 'slug' => 'pdf-to-word', 'description' => 'Convert PDF documents into editable Word files.'],
                    ['title' => 'PDF to XML', 'slug' => 'pdf-to-xml', 'description' => 'Convert PDF content into XML format.'],
                ],
            ],
        ],
        'related' => [],
    ],
];
