@extends('front-design-pages.front-layout.app')
<!-- Body main wrapper start -->
@section('page-id', 'single-course-page')
@section('page-content')
<style>
    /* Action buttons hover effect */
    .btn-single-course-option {
        transition: all 0.3s ease;
    }

    .btn-single-course-option:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        opacity: 0.9;
    }

    /* Register button hover effect */
    .btn-primary {
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Social media buttons hover effect */
    .social-btn {
        transition: all 0.3s ease;
    }

    .social-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Form submit button hover effect */
    .genric-btn {
        transition: all 0.3s ease;
    }

    .genric-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Refresh captcha button hover effect */
    #refresh-captcha {
        transition: all 0.3s ease;
    }

    #refresh-captcha:hover {
        transform: rotate(180deg);
        background-color: #6c757d;
    }

    /* Related Courses Product Card Hover Effects */
    .ltn__product-item-3 .product-img.shine::before {
        animation: none;
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.3) 100%);
        content: "";
        display: block;
        height: 100%;
        left: -75%;
        position: absolute;
        top: 0;
        transform: skewX(-25deg);
        width: 50%;
        z-index: 2;
    }

    .ltn__product-item-3 .product-img.shine:hover::before {
        animation: shine 0.75s ease-in-out;
    }

    @keyframes shine {
        0% {
            left: -75%;
        }
        100% {
            left: 125%;
        }
    }

    /* White underline on course title when hovering card */
    .ltn__product-item:hover .course-badge h3 a {
        text-decoration: underline;
        text-decoration-color: white;
        text-underline-offset: 4px;
    }

    /* Smooth transition for title link */
    .course-badge h3 a {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    /* Remove pointer cursor from product-img since it's not fully clickable */
    .ltn__product-item-3 .product-img {
        cursor: default;
        position: relative;
        overflow: hidden;
    }

    /* Ensure title and arrow are clearly clickable */
    .course-badge h3 a,
    .icon-arrow a {
        cursor: pointer;
    }

    /* Course Rounds Table Styles */
    .table-single-course-details {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2c3e50;
        margin: 0;
    }

    .course-duration {
        background: #F5F7FB;
        color: #000;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
    }

    .course-rounds-table {
        margin-bottom: 0;
    }

    .course-rounds-table thead th {
        background: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
        color: #495057;
        font-weight: 600;
        padding: 15px;
    }

    .course-rounds-table tbody td {
        padding: 15px;
        vertical-align: middle;
    }

    .round-code {
        background: #e0e2e7;
        color: #000;
        padding: 5px 10px;
        border-radius: 4px;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 120px;
    }

    .date-info,
    .venue-info {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #000;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 150px;
    }

    .date-info i,
    .venue-info i {
        color: #000;
    }

    .price-info {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .currency {
        color: #000;
        font-size: 0.9rem;
    }

    .amount {
        font-weight: 600;
        color: #000;
    }

    .btn-register {
        background: #1976d2;
        color: white;
        padding: 8px 20px;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-register:hover {
        background: #1565c0;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .pricing-note {
        margin-top: 15px;
        color: #6c757d;
        font-size: 0.9rem;
    }

    /* Breadcrumb Navigation Styles - Inside Header */
    .breadcrumb-navigation {
        background: transparent;
        padding: 15px 0;
        margin-bottom: 0;
        margin-top: 20px;
        position: absolute;
        bottom: -50px;
        left: 0;
        width: 100%;
        z-index: 100;
    }

    .breadcrumb {
        background: transparent;
        padding: 0;
        margin: 0;
        list-style: none;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: center;
    }

    .breadcrumb-nav-desktop {
        display: block;
    }

    .breadcrumb-nav-mobile {
        display: none;
    }

    .breadcrumb-mobile-home {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        color: #fff;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: background 0.2s ease, border-color 0.2s ease;
    }

    .breadcrumb-mobile-home:hover {
        background: rgba(255, 255, 255, 0.14);
        border-color: rgba(255, 255, 255, 0.4);
        color: #fff;
    }

    .breadcrumb-mobile-text {
        display: flex;
        flex-direction: column;
        gap: 4px;
        text-align: left;
    }

    .breadcrumb-mobile-category {
        font-size: 15px;
        font-weight: 600;
        color: #fff;
        line-height: 1.2;
        text-decoration: none;
    }

    .breadcrumb-mobile-category:hover {
        color: #f5f5f5;
    }

    .breadcrumb-mobile-course {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.2;
        text-decoration: none;
    }

    .breadcrumb-mobile-course:hover {
        color: #fff;
    }

    .breadcrumb-item {
        display: flex;
        align-items: center;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.8);
    }

        {
            {
            -- .breadcrumb-item:not(:last-child)::after {
                content: '/';
                margin: 0 10px;
                color: rgba(255, 255, 255, 0.6);
                font-weight: 300;
            }

            --
        }
    }

    .breadcrumb-link {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
        padding: 5px 8px;
        border-radius: 4px;
    }

    .breadcrumb-link:hover {
        color: #ffffff;
        background: rgba(255, 255, 255, 0.1);
        text-decoration: none;
    }

    .breadcrumb-link i {
        font-size: 12px;
    }

    .breadcrumb-item.active {
        color: #ffffff;
        font-weight: 500;
    }

    .breadcrumb-item.active::after {
        display: none;
    }

    /* Responsive breadcrumb */
    @media (max-width: 768px) {
        .breadcrumb {
            font-size: 12px;
            justify-content: flex-start;
            padding: 0 15px;
        }

        .breadcrumb-link {
            padding: 3px 6px;
        }

        .breadcrumb-item:not(:last-child)::after {
            margin: 0 6px;
        }
    }

    @media (max-width: 480px) {
        .breadcrumb {
            font-size: 11px;
            flex-wrap: wrap;
        }

        .breadcrumb-item {
            margin-bottom: 5px;
        }
    }

    /* Course Details Section Styling */
    .main-course-title-and-details {
        text-align: center;
        padding: 60px 0;

        position: relative;
        overflow: hidden;
    }

    .main-course-title-and-details::before {

        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #1976d2, #42a5f5, #1976d2);
        background-size: 200% 100%;
        animation: gradient-shift 3s ease-in-out infinite;
    }

    @keyframes gradient-shift {

        0%,
        100% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }
    }

    .main-course-title-and-details h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }

    .main-course-title-and-details h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #1976d2, #42a5f5);
        border-radius: 2px;
    }

    .main-course-title-and-details p {
        font-size: 1.2rem;
        color: #6c757d;
        font-weight: 400;
        margin: 0;
        opacity: 0;
        transform: translateY(20px);
        animation: fade-in-up 0.8s ease-out 0.3s forwards;
    }

    @keyframes fade-in-up {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .main-course-title-and-details {
            padding: 50px 0;
        }

        .main-course-title-and-details h2 {
            font-size: 2.2rem;
        }
    }

    @media (max-width: 768px) {
        .main-course-title-and-details {
            padding: 40px 0;
        }

        .main-course-title-and-details h2 {
            font-size: 1.8rem;
        }

        .main-course-title-and-details p {
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .main-course-title-and-details {
            padding: 30px 0;
        }

        .main-course-title-and-details h2 {
            font-size: 1.5rem;
            line-height: 1.3;
        }

        .main-course-title-and-details p {
            font-size: 0.9rem;
        }
    }

    /* Upcoming Course Card Styles */
    .upcoming-course-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .card-header {
        background: #1976d2;
        color: white;
        padding: 20px;
    }

    .card-title {
        margin: 0;
        font-size: 1rem;
        font-weight: 600;
    }

    .card-body {
        padding: 25px;
    }

    .details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 25px;
    }

    .detail-item {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
    }

    .detail-label {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .detail-value {
        color: #2c3e50;
        font-weight: 500;
    }

    .venue-section {
        margin-bottom: 25px;
    }

    .venue-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .venue-item {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
    }

    .venue-label {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .venue-value {
        color: #2c3e50;
        font-weight: 500;
    }

    .btn-register-large {
        background: #1976d2;
        color: white;
        padding: 12px 30px;
        border-radius: 8px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-register-large:hover {
        background: #1565c0;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .no-rounds-message {
        color: #6c757d;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .social-share {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .share-label {
        color: #6c757d;
        font-size: 0.9rem;
    }

    .social-buttons {
        display: flex;
        gap: 10px;
    }

    .social-btn {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all 0.3s ease;
    }

    .social-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .fb-btn {
        background: #1877f2;
    }

    .twitter-btn {
        background: #000;
        color: #fff;
    }

    .linkedin-btn {
        background: #0077b5;
    }

    .whatsapp-btn {
        background: #25d366;
    }

    .messenger-btn {
        background: #0084ff;
    }

    .email-btn {
        background: #ea4335;
    }

    .social-btn.twitter-btn svg {
        display: block;
        margin: auto;
    }

    /* Course Rounds Table Responsive Styles */
    @media (max-width: 1024px) {
        .table-single-course-details {
            padding: 20px;
        }

        .course-rounds-table thead th,
        .course-rounds-table tbody td {
            padding: 12px 10px;
        }

        .round-code {
            max-width: 100px;
            font-size: 0.8rem;
        }

        .date-info,
        .venue-info {
            max-width: 130px;
            font-size: 0.85rem;
        }
    }

    @media (max-width: 768px) {
        .table-single-course-details {
            padding: 15px;
            margin-bottom: 20px;
        }

        .section-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .section-title {
            font-size: 1.3rem;
        }

        .course-duration {
            font-size: 0.8rem;
            padding: 4px 12px;
        }

        .course-rounds-table {
            font-size: 0.85rem;
        }

        .course-rounds-table thead th,
        .course-rounds-table tbody td {
            padding: 10px 8px;
        }

        .round-code {
            max-width: 80px;
            font-size: 0.75rem;
            padding: 3px 8px;
        }

        .date-info,
        .venue-info {
            max-width: 110px;
            font-size: 0.8rem;
        }

        .btn-register {
            padding: 6px 15px;
            font-size: 0.8rem;
        }

        .social-share {
            flex-direction: column;
            align-items: flex-start;
        }

        .social-buttons {
            margin-top: 10px;
        }

        .main-course-bg-header .course-main-title h2 {
            color: #fff;
            font-size: 22px !important;
            padding: 0 5px;
        }

        .details-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .venue-details {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .action-section .row {
            flex-direction: column;
        }

        .action-section .col-md-4,
        .action-section .col-md-8 {
            width: 100%;
            margin-bottom: 15px;
        }
    }

    @media (max-width: 480px) {
        .table-single-course-details {
            padding: 10px;
        }

        .section-title {
            font-size: 1.1rem;
        }

        .course-rounds-table {
            font-size: 0.75rem;
        }

        .course-rounds-table thead th,
        .course-rounds-table tbody td {
            padding: 8px 5px;
        }

        .round-code {
            max-width: 60px;
            font-size: 0.7rem;
            padding: 2px 6px;
        }

        .date-info,
        .venue-info {
            max-width: 90px;
            font-size: 0.75rem;
        }

        .btn-register {
            padding: 5px 12px;
            font-size: 0.75rem;
        }

        .social-buttons {
            flex-wrap: wrap;
            gap: 8px;
        }

        .social-btn {
            width: 30px;
            height: 30px;
        }

        .btn-register-large {
            padding: 10px 20px;
            font-size: 0.9rem;
        }
    }

    /* Responsive Table with Data Labels */
    @media (max-width: 768px) {
        .course-rounds-table,
        .course-rounds-table thead,
        .course-rounds-table tbody,
        .course-rounds-table th,
        .course-rounds-table td,
        .course-rounds-table tr {
            display: block;
        }

        .course-rounds-table thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        .course-rounds-table tr {
            border: 1px solid #ccc;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
            background: #fff;
        }

        .course-rounds-table td {
            border: none;
            position: relative;
            padding: 8px 0 8px 50% !important;
            text-align: left;
        }

        .course-rounds-table td:before {
            content: attr(data-label) ": ";
            position: absolute;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            font-weight: bold;
            color: #2c3e50;
        }

        .round-code,
        .date-info,
        .venue-info,
        .price-info {
            max-width: none !important;
            white-space: normal !important;
        }

        .btn-register {
            width: 100%;
            text-align: center;
            margin-top: 10px;
        }
    }

    @media (max-width: 478px) {

        .breadcrumb-navigation {
            bottom: -100px;
        }
    }

    .course-rounds-table tr td {
        font-size: 12px !important;
    }

    /* Action Buttons Responsive Styles */
    @media (max-width: 768px) {
        .action-btns .col-12 {
            flex-direction: column;
            gap: 10px;
        }

        .btn-single-course-option {
            width: 100%;
            text-align: center;
            padding: 12px 20px;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 480px) {
        .btn-single-course-option {
            padding: 10px 15px;
            font-size: 0.85rem;
        }
    }

    /* Form Responsive Styles */
    @media (max-width: 768px) {
        .form-area .row {
            margin: 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group.col-lg-6 {
            width: 100%;
            padding: 0;
        }

        .form-control {
            font-size: 0.9rem;
            padding: 10px 12px;
        }

        .genric-btn {
            width: 100%;
            padding: 12px 20px;
            font-size: 0.9rem;
        }

        .captcha {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .captcha span {
            margin-bottom: 10px;
        }
    }

    @media (max-width: 480px) {
        .form-control {
            font-size: 0.85rem;
            padding: 8px 10px;
        }

        .genric-btn {
            padding: 10px 15px;
            font-size: 0.85rem;
        }

        .captcha {
            gap: 8px;
        }
    }
    /* Accordion header icon: force chevrons and suppress theme plus/minus */
    .ltn__faq-inner .ltn__card-title {
        position: relative;
        padding-right: 40px;
        cursor: pointer;
    }
    /* Hide any existing pseudo icon from the theme */
    .ltn__faq-inner .ltn__card-title::before {
        content: none !important;
    }
    /* Our chevron icon */
    .ltn__faq-inner .ltn__card-title::after {
        content: "\f078" !important; /* fa-chevron-down */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        line-height: 1;
        color: inherit;
        transition: transform 0.2s ease;
    }
    /* When expanded, show up arrow */
    .ltn__faq-inner .ltn__card-title[aria-expanded="true"]::after,
    .ltn__faq-inner .ltn__card-title:not(.collapsed)[aria-expanded="true"]::after {
        content: "\f077" !important; /* fa-chevron-up */
    }

    /* Main Layout Responsive Styles */
    @media (max-width: 1024px) {
        .container {
            padding: 0 15px;
        }

        .main-img-of-course img {
            max-width: 100%;
            height: auto;
        }
    }

    @media (max-width: 768px) {
        .container {
            padding: 0 10px;
        }

        .row {
            margin: 0;
        }

        .col-12.col-lg-6 {
            padding: 0;
            margin-bottom: 30px;
        }

        .main-img-of-course {
            margin-bottom: 20px;
        }

        .main-img-of-course img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .ltn__faq-area {
            margin-bottom: 50px;
        }

        .ltn__card-title {
            font-size: 0.95rem;
            padding: 15px 20px 15px 15px;
        }

        .card-body {
            padding: 20px 15px;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 5px;
        }

        .col-12.col-lg-6 {
            margin-bottom: 20px;
        }

        .ltn__card-title {
            font-size: 0.9rem;
            padding: 12px 15px 12px 12px;
        }

        .card-body {
            padding: 15px 12px;
        }
    }

    /* Related Courses Responsive Styles */
    @media (max-width: 768px) {
        .ltn__blog-slider-one-active {
            margin: 0;
        }

        .ltn__product-item {
            margin-bottom: 20px;
        }

        .product-img {
            height: 250px !important;
        }

        .course-badge {
            padding: 15px !important;
        }

        .course-badge h3 {
            font-size: 1.1rem !important;
            line-height: 1.3;
        }

        .course-badge p {
            font-size: 0.85rem !important;
            line-height: 1.4;
        }

        .category-title {
            font-size: 0.8rem;
        }

        .bottom-title {
            font-size: 0.8rem !important;
        }

        .breadcrumb-navigation {
            padding: 12px 0 5px;
            {{--  bottom: 5px;  --}}
        }

        .breadcrumb-nav-desktop {
            display: none;
        }

        .breadcrumb-nav-mobile {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .breadcrumb-mobile-text {
            align-items: flex-start;
        }
    }

    @media (max-width: 480px) {
        .product-img {
            height: 200px !important;
        }

        .course-badge {
            padding: 12px !important;
        }

        .course-badge h3 {
            font-size: 1rem !important;
        }

        .course-badge p {
            font-size: 0.8rem !important;
        }

        .category-title {
            font-size: 0.75rem;
        }

        .bottom-title {
            font-size: 0.75rem !important;
        }
    }
</style>

<!-- Breadcrumb Navigation -->


<div class="main-course-bg-header">

        <div class="course-main-title text-center" style='position: relative;'>
        <h2>{{ $course->course_en_name }}</h2>
        <div class="breadcrumb-navigation">
            <div class="container">
                <nav aria-label="breadcrumb" class="breadcrumb-nav-desktop">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="breadcrumb-link">
                                <i class="fas fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        @if($course->subCategory && $course->subCategory->courseCategory)
                        <li class="breadcrumb-item">
                            <i class="fas fa-chevron-right breadcrumb-arrow"></i>
                            <a href="{{ route('category.show', ['id' => $course->subCategory->courseCategory->id]) }}"
                                class="breadcrumb-link">
                                {{ $course->subCategory->courseCategory->category_en_name }}
                            </a>
                        </li>
                        @endif
                        @if($course->subCategory)
                        <li class="breadcrumb-item">
                            <i class="fas fa-chevron-right breadcrumb-arrow"></i>
                            <a href="{{ route('course-search', ['subcategory_id' => $course->subCategory->id]) }}"
                                class="breadcrumb-link">
                                {{ $course->subCategory->subcategory_en_name }}
                            </a>
                        </li>
                        @endif
                    </ol>
                </nav>
                <nav aria-label="breadcrumb mobile" class="breadcrumb-nav-mobile">
                    <a href="{{ url('/') }}" class="breadcrumb-mobile-home" aria-label="Home">
                        <i class="fas fa-home"></i>
                    </a>
                    <div class="breadcrumb-mobile-text">
                        @if($course->subCategory && $course->subCategory->courseCategory)
                            <a href="{{ route('category.show', ['id' => $course->subCategory->courseCategory->id]) }}"
                                class="breadcrumb-mobile-category">
                                {{ $course->subCategory->courseCategory->category_en_name }}
                            </a>
                        @elseif($course->subCategory)
                            <span class="breadcrumb-mobile-category">
                                {{ $course->subCategory->subcategory_en_name }}
                            </span>
                        @else
                            <span class="breadcrumb-mobile-category">
                                {{ $course->course_en_name }}
                            </span>
                        @endif

                        @if($course->subCategory)
                            <a href="{{ route('course-search', ['subcategory_id' => $course->subCategory->id]) }}"
                                class="breadcrumb-mobile-course">
                                {{ $course->course_en_name }}
                            </a>
                        @else
                            <span class="breadcrumb-mobile-course">
                                {{ $course->course_en_name }}
                            </span>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
    </div>

</div>
@if ($message = Session::get('message'))
<div id="alertDivDetails" class="alert alert-info"
    style="position: relative; padding: 15px; border-radius: 5px; margin-top: 20px;">
    <button type="button" id="alertCloseDetails"
        style="position: absolute; top: 5px; right: 10px; background: none; border: none; font-size: 20px; line-height: 20px;">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="container main-course-title-and-details">
    {{-- <span>{{ $course->subCategory->courseCategory->category_en_name ?? '' }}</span> --}}
    <h2>Course Details</h2>
    <p style="color: #000">Your Growth, Our Mission</p>
</div>
<div class="container">
    <div class="row ">
        <div class="col-12 col-lg-6  mt-0 mt-lg-5">
            <div class="main-img-of-course text-center">
                <img src="{{ $course->course_image ? asset('uploads/courses/' . $course->course_image) : asset('front-assets/img/No-Image-Placeholder.svg.png') }}"
                    onerror="this.onerror=null;this.src='{{ asset('front-assets/img/No-Image-Placeholder.svg.png') }}';"
                    alt="{{ $course->course_en_name }}">
            </div>

            <div class="ltn__faq-area mb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="ltn__faq-inner ltn__faq-inner-2">
                                <div id="accordion_2">
                                    <!-- card -->
                                    <div class="card">
                                        <h6 class="ltn__card-title" data-bs-toggle="collapse"
                                            data-bs-target="#faq-item-2-1" aria-expanded="true">
                                            Course Description
                                        </h6>
                                        <div id="faq-item-2-1" class="collapse show" data-bs-parent="#accordion_2">
                                            <div class="card-body">
                                                {!! $course->course_en_desc !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card -->
                                    <div class="card">
                                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                            data-bs-target="#faq-item-2-2" aria-expanded="false">
                                            The Training Course Will Highlight ?
                                        </h6>
                                        <div id="faq-item-2-2" class="collapse " data-bs-parent="#accordion_2">
                                            <div class="card-body">

                                                {!! $course->course_highlight !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card -->
                                    <div class="card">
                                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                            data-bs-target="#faq-item-2-3" aria-expanded="false">
                                            Training Objective
                                        </h6>
                                        <div id="faq-item-2-3" class="collapse" data-bs-parent="#accordion_2">
                                            <div class="card-body">
                                                {!! $course->course_highlight !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card -->
                                    {{-- <div class="card">
                                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                            data-bs-target="#faq-item-2-4" aria-expanded="false">
                                            Returns and refunds
                                        </h6>
                                        <div id="faq-item-2-4" class="collapse" data-bs-parent="#accordion_2">
                                            <div class="card-body">
                                                {!! $course->course_objectives !!}
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- card -->
                                    <div class="card">
                                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                            data-bs-target="#faq-item-2-5" aria-expanded="false">
                                            Target Audience
                                        </h6>
                                        <div id="faq-item-2-5" class="collapse" data-bs-parent="#accordion_2">
                                            <div class="card-body">
                                                {!! $course->course_audience !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card -->
                                    <div class="card">
                                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                            data-bs-target="#faq-item-2-6" aria-expanded="false">
                                            Training Methods
                                        </h6>
                                        <div id="faq-item-2-6" class="collapse" data-bs-parent="#accordion_2">
                                            <div class="card-body">
                                                {!! $course->course_training_methods !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card -->
                                    <div class="card">
                                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                            data-bs-target="#faq-item-2-7" aria-expanded="false">
                                            Daily Agenda
                                        </h6>
                                        <div id="faq-item-2-7" class="collapse" data-bs-parent="#accordion_2">
                                            <div class="card-body">
                                                {!! $course->course_daily_agenda !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                            data-bs-target="#faq-item-2-8" aria-expanded="false">
                                            Accreditation
                                        </h6>
                                        <div id="faq-item-2-8" class="collapse" data-bs-parent="#accordion_2">
                                            <div class="card-body">
                                                {!! $course->Accreditation !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                            data-bs-target="#faq-item-2-9" aria-expanded="false">
                                            Quick Enquiry
                                        </h6>
                                        <div id="faq-item-2-9" class="collapse" data-bs-parent="#accordion_2">
                                            <div class="card-body">
                                                <h4>Request Info</h4>
                                                <form class="form-area contact-form text-right"
                                                    action="{{ url('/registerApplicants') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}" />
                                                    <input type="hidden" name="applicant_type_id" value=2 />
                                                    <div class="row">
                                                        <div class="form-group col-lg-6 col-md-12 name">
                                                            <label>Salutation</label>
                                                            <select name="salut_id" class="form-control"
                                                                style="padding:0 12px;border: 1px solid #CCC;">
                                                                <option value=""></option>
                                                                @foreach ($saluts as $salut)
                                                                <option value='{{ $salut->id }}' @if (old('salut_id')=="$salut->id" ) {{ 'selected' }} @endif>
                                                                    {{ $salut->en_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 email">
                                                            <label>Full Name*</label>
                                                            <input type="text" name="name" value="{{ old('name') }}"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-lg-6 col-md-12 name">
                                                            <label>Designation</label>
                                                            <input name="job_title" type="text"
                                                                value="{{ old('job_title') }}" class="form-control">
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 email">
                                                            <label>Company*</label>
                                                            <input type="text" name="company"
                                                                value="{{ old('company') }}" class="form-control" required >
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-lg-6 col-md-12 name">
                                                            <label>Country*</label>
                                                            <select name="country_id" class="form-control"
                                                                style="padding:0 15px;border: 1px solid #CCC;">
                                                                <option value=""></option>
                                                                @foreach ($countries as $country)
                                                                <option value='{{ $country->id }}' @if (old('country_id')=="$country->id" ) {{ 'selected' }} @endif> {{ $country->country_en_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 email">
                                                            <label>City*</label>
                                                            <select name="venue_id" class="form-control"
                                                                style="padding:0 12px;border: 1px solid #CCC;">
                                                                <option value=""></option>
                                                                @foreach ($venues as $venue)
                                                                <option value='{{ $venue->id }}' @if (old('venue_id')=="$venue->id" ) {{ 'selected' }} @endif> {{ $venue->venue_en_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-lg-6 col-md-12 email">
                                                            <label> Email*</label>
                                                            <input type="text" name="email" value="{{ old('email') }}"
                                                                class="form-control" required >
                                                        </div>
                                                    </div>
                                                    <div class="form-group  form-inline">
                                                        <label>Enquiry*</label>
                                                        <textarea name="quk_enquery_notes"
                                                            value="{{ old('quk_enquery_notes') }}"
                                                            class="form-control mb-10"
                                                            rows="5">{{ Request::old('quk_enquery_notes') }}</textarea>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-lg-6">
                                                            <label>Captcha*</label>
                                                            <div class="captcha d-flex align-items-center gap-2">
                                                                <span id="captcha-img">{!! captcha_img('math')
                                                                    !!}</span>
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    id="refresh-captcha"
                                                                    style="margin-left: 10px; padding: 6px 10px;">
                                                                    <i class="fas fa-sync-alt"></i>
                                                                </button>

                                                            </div>
                                                        </div>

                                                        <div class="form-group col-lg-6">
                                                            <label>Enter Captcha*</label>
                                                            <input id="captcha" type="text" class="form-control"
                                                                name="captcha">
                                                            @error('captcha')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <button type="submit" class="btn btn-primary" style="border-radius: 6px;margin-top:15px">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="row action-btns mb-4">
                <div class="col-12">
                    <div class="d-flex flex-wrap justify-content-between gap-2 action-buttons-container">
                        <a href='{{ url("/downloadBrochure/$course->id") }}' class="btn-single-course-option">
                            <i class="fas fa-download mr-2"></i> Download Brochure
                        </a>
                        <a href='{{ url("/requestInHouse/$course->id") }}' class="btn-single-course-option">
                            Request In house Proposal
                        </a>
                        <a href='{{ url("/requestOnline/$course->id") }}' class="btn-single-course-option">
                            Request Online Proposal
                        </a>
                    </div>
                </div>
            </div>
            <!-- Course Rounds Table -->
            <div class="table-single-course-details">
                <div class="section-header mb-4">
                    <h3 class="section-title" style="text-transform: math-auto !important;">Course Rounds</h3>
                    <span class="course-duration">{{ $course->course_duration }} Days</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover course-rounds-table">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Date</th>
                                <th>Venue</th>
                                <th>Fees</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rounds as $round)
                            <tr>
                                <td data-label="Code"><span class="round-code">{{ $round->round_code }}</span></td>
                                <td data-label="Date">
                                    @if ($round)
                                    <div class="date-info">
                                        <i class="far fa-calendar-alt"></i>
                                        {{ date_format(date_create($round->round_start_date), 'Y-m-d') }}
                                    </div>
                                    @else
                                    <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td data-label="Venue">
                                    <div class="venue-info">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $round->venue->venue_en_name ?? '' }}
                                    </div>
                                </td>
                                <td data-label="Fees">
                                    <div class="price-info">
                                        <span class="currency">{{ $round->currancy->currency_name ?? '' }}</span>
                                        <span class="amount">{{ $round->round_price }}</span>
                                    </div>
                                </td>
                                <td data-label="Action">
                                    <a href='{{ url("/registerCourse/$round->id") }}' class="btn btn-register"
                                        style="font-size: 12px !important;">
                                        Register
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="pricing-note"><i class="fas fa-info-circle"></i> Prices don't include VAT</p>
            </div>
            <div class="social-single-course" style="background-color: #fff;font-size: 12px !important;">
                <div class="upcoming-course-card">
                    <div class="card-header" style="background: #fff">
                        <h2 class="card-title" style="text-transform: math-auto !important;">Upcoming Session</h2>
                    </div>

                    <div class="card-body">
                        <div class="course-details-section">
                            <h3 class="section-title" style="text-transform: math-auto !important;">Session Details</h3>
                            <div class="details-grid">
                                <div class="detail-item">
                                    <div class="detail-label">
                                        <i class="far fa-calendar-check"></i>
                                        Start Date
                                    </div>
                                    <div class="detail-value">
                                        {{ $specfic_round && $specfic_round->round_start_date ?
                                        \Carbon\Carbon::parse($specfic_round->round_start_date)->format('d M, Y') :
                                        'N/A' }}
                                    </div>
                                </div>
                                <div class="detail-item">
                                    <div class="detail-label">
                                        <i class="far fa-calendar-times"></i>
                                        End Date
                                    </div>
                                    <div class="detail-value">
                                        {{ $specfic_round && $specfic_round->round_end_date ?
                                        \Carbon\Carbon::parse($specfic_round->round_end_date)->format('d M, Y') : 'N/A'
                                        }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="venue-section">
                            <h3 class="section-title" style="text-transform: math-auto !important;">Venue Information
                            </h3>
                            <div class="venue-details">
                                <div class="venue-item">
                                    <div class="venue-label">
                                        <i class="fas fa-globe"></i>
                                        Country
                                    </div>
                                    <div class="venue-value">{{ $specfic_round->country->country_en_name ?? '' }}
                                    </div>
                                </div>
                                <div class="venue-item">
                                    <div class="venue-label">
                                        <i class="fas fa-building"></i>
                                        Venue
                                    </div>
                                    <div class="venue-value">{{ $specfic_round->venue->venue_en_name ?? '' }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="action-section">
                            <div class="row align-items-center">
                                <div class="col-md-4 col-12 mb-3 mb-md-0">
                                    @if ($specfic_round)
                                    <a href="{{ url("/registerCourse/$specfic_round->id") }}"
                                        class="btn btn-primary btn-register-large p-2" >
                                        <i class="fas fa-user-plus"></i>
                                        Register Now
                                    </a>
                                    @else
                                    <p class="no-rounds-message">
                                        <i class="fas fa-info-circle"></i>
                                        No rounds available for registration
                                    </p>
                                    @endif
                                </div>
                                @php
                                $courseUrl = url('/courseDetails/' . $course->id); // هذا يعطي
                                https://bts.activegroup-eg.com/courseDetails/3032
                                $courseTitle = $course->title ?? 'Course Title';
                                @endphp
                                <div class="col-md-8 col-12">
                                    <div class="social-share" style="font-size: 12px">
                                        <span class="share-label">Share </span>
                                        <div class="social-buttons">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($courseUrl) }}"
                                                target="_blank" class="social-btn fb-btn" title="Share on Facebook">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode($courseUrl) }}&text={{ urlencode($courseTitle) }}"
                                                target="_blank" class="social-btn twitter-btn" title="Share on X">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    style="width:16px;height:16px">
                                                    <path fill="#676767"
                                                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                                </svg>
                                            </a>
                                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($courseUrl) }}"
                                                target="_blank" class="social-btn linkedin-btn"
                                                title="Share on LinkedIn">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                            <a href="https://wa.me/?text={{ urlencode($courseTitle . ' - ' . $courseUrl) }}"
                                                target="_blank" class="social-btn whatsapp-btn"
                                                title="Share on WhatsApp">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                            <a href="fb-messenger://share?link={{ urlencode($courseUrl) }}"
                                                target="_blank" class="social-btn messenger-btn"
                                                title="Share on Messenger">
                                                <i class="fab fa-facebook-messenger"></i>
                                            </a>
                                            <a href="mailto:?subject={{ urlencode($courseTitle) }}&body={{ urlencode($courseUrl) }}"
                                                class="social-btn email-btn" title="Share via Email">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="container main-course-title-and-details">
            <h2>Related Courses</h2>
            <p style='color: #000'>Your Growth, Our Mission</p>
        </div>
        <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
            @foreach ($related_courses as $related_course)
            <!-- Blog Item -->
            <div class="col-lg-12 ">
                <div class="ltn__product-item ltn__product-item-3 text-left">
                    <div class="product-img shine" style='height: 100%;'>
                        <img height="100%"
                            src="{{ $related_course->relatedcourse->course_image_thumbnail
                                ? asset('uploads/courses/' . $related_course->relatedcourse->course_image_thumbnail)
                                : asset('front-assets/img/No-Image-Placeholder.svg.png') }}"
                            onerror="this.onerror=null;this.src='{{ asset('front-assets/img/No-Image-Placeholder.svg.png') }}';"
                            alt="{{ $related_course->relatedcourse->course_en_name }}">
                        <div class="course-badge p-3">
                            <div class="row">
                                <div class="col-12 title-section">
                                    <h3 class='white-color'>
                                        <a href="{{ url('courseDetails/' . $related_course->relatedcourse->id) }}">
                                            {{ Str::limit($related_course->relatedcourse->course_en_name, 89, '') }}
                                        </a>
                                    </h3>
                                    <p class='white-color'>
                                        {{ Str::limit($related_course->relatedcourse->course_en_desc, 200, ' ...') }}
                                    </p>
                                </div>

                                <div class="col-12 row align-items-center">
                                    <span class="category-title">{{
                                        $related_course->relatedcourse->subCategory->courseCategory->category_en_name ??
                                        '' }}</span>
                                    <div class="col-10 white-color bottom-title">
                                        {{ $related_course->related_course->venue->venue_en_name ?? '' }} -
                                        {{ $related_course->related_course->country->country_en_name ?? '' }} | 24
                                        Nov, 2024
                                    </div>
                                    <div class="col-2 ">
                                        <span class="icon-arrow">
                                            <a href="{{ url('courseDetails/' . $related_course->relatedcourse->id) }}"><i
                                                    class="fa fa-arrow-right white-color"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    document.getElementById('refresh-captcha').addEventListener('click', function() {
            fetch('/refresh-captcha')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('captcha-img').innerHTML = data.captcha;
                });
        });
        $(document).on('click', '#alertCloseDetails', function() {
            $('#alertDivDetails').fadeOut();
        });
</script>
@endsection
