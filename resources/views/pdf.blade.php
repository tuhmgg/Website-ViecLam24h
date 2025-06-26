<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="{{asset('image/logo-vieclam24h.png')}}" type="image/x-icon">

    <title>CV {{$data['name']}} - ViecLam24h</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }
        
        .cv-header {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            padding: 30px;
        }
        
        .logo-section {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .logo-section img {
            height: 60px;
            margin-bottom: 10px;
        }
        
        .logo-section h2 {
            color: #4e73df;
            font-weight: 700;
            margin: 0;
            font-size: 24px;
        }
        
        .logo-section p {
            color: #858796;
            margin: 5px 0 0 0;
            font-size: 14px;
        }
        
        .logo-section .slogan {
            color: #4e73df;
            font-size: 16px;
            font-weight: 500;
            line-height: 1.5;
            margin: 15px 0 10px 0;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .logo-section .subtitle {
            color: #858796;
            font-size: 14px;
            font-weight: 400;
            margin: 0;
            opacity: 0.8;
        }
        
        .cv-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            margin: 0 auto;
            max-width: 800px;
        }
        
        .cv-preview {
            width: 595px;
            height: 842px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        
        .cv-card {
            width: 595px;
            height: 842px;
            position: relative;
            display: flex;
            flex-direction: column;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #e3e6f0;
            border-radius: 0.35rem;
        }

        .cv-left {
            width: 207px;
            height: 842px;
            background: linear-gradient(135deg, #fbf0d5 0%, #f8f4e6 100%);
            position: absolute;
            left: 0;
            top: 0;
        }

        .cv-right {
            position: absolute;
            right: 0;
            width: 388px;
            height: 840px;
            background-color: white;
            padding: 31px;
        }

        .cv-footer {
            position: absolute;
            bottom: 0;
            width: 594px;
            height: 20px;
            background: linear-gradient(90deg, #720000 0%, #8b0000 100%);
        }

        .avatar {
            height: 139px;
            width: 139px;
            border-radius: 50%;
            position: absolute;
            top: 30px;
            left: 32px;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            object-fit: cover;
        }

        .name {
            text-align: center;
            font-weight: bold;
            font-size: 17px;
            font-family: Inter, sans-serif;
            color: #0C3149;
            margin-top: 200px;
            text-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .divider {
            height: 3px;
            background: linear-gradient(90deg, #0C3149 0%, #1a4a6b 100%);
            width: 139px;
            position: absolute;
            left: 32px;
            border-radius: 2px;
        }

        .divider-1 { top: 270px; }
        .divider-2 { top: 580px; }

        .bio {
            padding: 1.5rem;
            text-align: justify;
            margin-top: 50px;
            font-size: 11px;
            font-family: Inter, sans-serif;
            color: #0C3149;
            line-height: 1.4;
        }

        .contact-item {
            position: absolute;
            left: 30px;
            font-weight: bold;
            font-size: 12px;
            font-family: Inter, sans-serif;
            color: #0C3149;
            display: flex;
            align-items: center;
        }

        .contact-item i {
            color: #0C3149;
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .phone { top: 630px; }
        .email { top: 670px; }
        .social { top: 710px; }
        .address { top: 750px; }

        .section-title {
            font-weight: bold;
            font-size: 25px;
            font-family: Inter, sans-serif;
            color: #0C3149;
            position: absolute;
            left: 75px;
            text-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .section-divider {
            height: 3px;
            background: linear-gradient(90deg, #0C3149 0%, #1a4a6b 100%);
            position: absolute;
            border-radius: 2px;
        }

        .education-title { top: 32px; }
        .education-divider { width: 139px; left: 200px; top: 51px; }
        .experience-title { top: 223px; }
        .experience-divider { width: 90px; left: 249px; top: 241px; }
        .skills-title { top: 560px; }
        .skills-divider { width: 140px; left: 200px; top: 580px; }
        .achievements-title { top: 681px; }
        .achievements-divider { width: 110px; left: 230px; top: 700px; }

        .section-content {
            position: absolute;
            width: 252px;
            font-size: 9.8pt;
            color: #0C3149;
            line-height: 1.3;
        }

        .education-content { margin-top: 45px; }
        .experience-content { margin-top: 250px; text-align: justify; }
        .skills-content { margin-top: 590px; }
        .achievements-content { margin-top: 710px; }

        .section-icon {
            color: #0C3149;
            position: absolute;
            font-size: 24px;
            text-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .education-icon { top: 50px; }
        .experience-icon { top: 240px; }
        .skills-icon { top: 580px; }
        .achievements-icon { top: 700px; }

        .cv-actions {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 30px;
            text-align: center;
        }

        .btn-cv {
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            margin: 0 10px;
        }

        .btn-cv:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .btn-back {
            background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
            border: none;
            color: white;
        }

        .btn-print {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            color: white;
        }

        .btn-download {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border: none;
            color: white;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            .cv-header, .cv-actions {
                display: none;
            }
            .cv-container {
                box-shadow: none;
                border-radius: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Header with Logo -->
    <div class="cv-header">
        <div class="logo-section">
            <img src="{{asset('image/logo-vieclam24h.png')}}" alt="ViecLam24h Logo">
            <p class="slogan">Tự do chọn lựa công việc, khám phá sức mạnh nghề nghiệp và tiến gần hơn đến mục tiêu sự nghiệp lớn lao của bạn.</p>
        </div>
    </div>

    <!-- CV Container -->
    <div class="cv-container">
        <div class="cv-preview">
            <div class="cv-card">
                <!-- Left Sidebar -->
                <div class="cv-left">
                    @if(!empty($imagePath))
                        <img src="{{Storage::url($imagePath)}}" class="avatar" alt="">
                    @else
                        @if(auth()->user()->profile_pic)
                            <img src="{{Storage::url(auth()->user()->profile_pic)}}" class="avatar" alt="">
                        @else
                            <img src="{{asset('img/undraw_profile.svg')}}" class="avatar" alt="">
                        @endif
                    @endif
                    
                    <p class="name">{{$data['name']}}</p>
                    <div class="divider divider-1"></div>
                    <p class="bio">{{$data["des"]}}</p>
                    <div class="divider divider-2"></div>
                    
                    <div class="contact-item phone">
                        <i class="fa-solid fa-phone fa-lg"></i>{{$data['phone']}}
                    </div>
                    <div class="contact-item email">
                        <i class="fa-solid fa-envelope fa-lg"></i>{{$data['mail']}}
                    </div>
                    <div class="contact-item social">
                        <i class="fa-brands fa-facebook fa-lg"></i>{{$data['social']}}
                    </div>
                    <div class="contact-item address">
                        <i class="fa-solid fa-map-marker-alt fa-lg"></i>{{$data['address']}}
                    </div>
                </div>
                
                <!-- Right Content -->
                <div class="cv-right">
                    <!-- Education -->
                    <i class="fa-solid fa-graduation-cap fa-xl section-icon education-icon"></i>
                    <p class="section-title education-title">Học Vấn</p>
                    <div class="section-divider education-divider"></div>
                    <div class="section-content education-content">
                        <p><strong>{{$data["school-1"]}}</strong><br>{{$data["des-school-1"]}}</p>
                        <p><strong>{{$data["school-2"]}}</strong><br>{{$data["des-school-2"]}}</p>
                    </div>
                    
                    <!-- Experience -->
                    <i class="fa-solid fa-briefcase fa-xl section-icon experience-icon"></i>
                    <p class="section-title experience-title">Kinh Nghiệm</p>
                    <div class="section-divider experience-divider"></div>
                    <div class="section-content experience-content">
                        <p><strong>{{$data["company-name-1"]}}</strong><br>{{$data["position-1"]}}<br>{{$data["pos-des-1"]}}</p>
                        <p><strong>{{$data["company-name-2"]}}</strong><br>{{$data["position-2"]}}<br>{{$data["pos-des-2"]}}</p>
                    </div>
                    
                    <!-- Skills -->
                    <i class="fa-solid fa-bolt fa-xl section-icon skills-icon"></i>
                    <p class="section-title skills-title">Kỹ Năng</p>
                    <div class="section-divider skills-divider"></div>
                    <div class="section-content skills-content">
                        <p><strong>{{$data["skill-1"]}}</strong><br>{{$data["skill-2"]}}</p>
                    </div>
                    
                    <!-- Achievements -->
                    <i class="fa-solid fa-award fa-xl section-icon achievements-icon"></i>
                    <p class="section-title achievements-title">Thành Tựu</p>
                    <div class="section-divider achievements-divider"></div>
                    <div class="section-content achievements-content">
                        <p><strong>{{$data["certificate"]}}</strong></p>
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="cv-footer"></div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="cv-actions">
        <a href="{{ route('create.cv') }}" class="btn btn-cv btn-back">
            <i class="fas fa-arrow-left me-2"></i>Quay lại
        </a>
        <button onclick="window.print()" class="btn btn-cv btn-print">
            <i class="fas fa-print me-2"></i>In CV
        </button>
        <button onclick="downloadCV()" class="btn btn-cv btn-download">
            <i class="fas fa-download me-2"></i>Tải xuống
        </button>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function downloadCV() {
            // Tạo một bản sao của trang để download
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <html>
                <head>
                    <title>CV {{$data['name']}}</title>
                    <style>
                        body { margin: 0; padding: 20px; font-family: 'Nunito', sans-serif; }
                        .cv-card { width: 595px; height: 842px; margin: 0 auto; position: relative; }
                        .cv-left { width: 207px; height: 842px; background: #fbf0d5; position: absolute; left: 0; top: 0; }
                        .cv-right { position: absolute; right: 0; width: 388px; height: 840px; background: white; padding: 31px; }
                        .cv-footer { position: absolute; bottom: 0; width: 594px; height: 20px; background: #720000; }
                        .avatar { height: 139px; width: 139px; border-radius: 50%; position: absolute; top: 30px; left: 32px; border: 4px solid white; }
                        .name { text-align: center; font-weight: bold; font-size: 17px; color: #0C3149; margin-top: 200px; }
                        .divider { height: 3px; background: #0C3149; width: 139px; position: absolute; left: 32px; }
                        .divider-1 { top: 270px; } .divider-2 { top: 580px; }
                        .bio { padding: 1.5rem; text-align: justify; margin-top: 50px; font-size: 11px; color: #0C3149; }
                        .contact-item { position: absolute; left: 30px; font-weight: bold; font-size: 12px; color: #0C3149; }
                        .phone { top: 630px; } .email { top: 670px; } .social { top: 710px; } .address { top: 750px; }
                        .section-title { font-weight: bold; font-size: 25px; color: #0C3149; position: absolute; left: 75px; }
                        .section-divider { height: 3px; background: #0C3149; position: absolute; }
                        .education-title { top: 32px; } .education-divider { width: 139px; left: 200px; top: 51px; }
                        .experience-title { top: 223px; } .experience-divider { width: 90px; left: 249px; top: 241px; }
                        .skills-title { top: 560px; } .skills-divider { width: 140px; left: 200px; top: 580px; }
                        .achievements-title { top: 681px; } .achievements-divider { width: 110px; left: 230px; top: 700px; }
                        .section-content { position: absolute; width: 252px; font-size: 9.8pt; color: #0C3149; }
                        .education-content { margin-top: 45px; } .experience-content { margin-top: 250px; text-align: justify; }
                        .skills-content { margin-top: 590px; } .achievements-content { margin-top: 710px; }
                        .section-icon { color: #0C3149; position: absolute; font-size: 24px; }
                        .education-icon { top: 50px; } .experience-icon { top: 240px; } .skills-icon { top: 580px; } .achievements-icon { top: 700px; }
                    </style>
                </head>
                <body>
                    <div class="cv-card">
                        <div class="cv-left">
                            @if(!empty($imagePath))
                                <img src="{{Storage::url($imagePath)}}" class="avatar" alt="">
                            @else
                                @if(auth()->user()->profile_pic)
                                    <img src="{{Storage::url(auth()->user()->profile_pic)}}" class="avatar" alt="">
                                @else
                                    <img src="{{asset('img/undraw_profile.svg')}}" class="avatar" alt="">
                                @endif
                            @endif
                            <p class="name">{{$data['name']}}</p>
                            <div class="divider divider-1"></div>
                            <p class="bio">{{$data["des"]}}</p>
                            <div class="divider divider-2"></div>
                            <div class="contact-item phone">{{$data['phone']}}</div>
                            <div class="contact-item email">{{$data['mail']}}</div>
                            <div class="contact-item social">{{$data['social']}}</div>
                            <div class="contact-item address">{{$data['address']}}</div>
                        </div>
                        <div class="cv-right">
                            <div class="section-title education-title">Học Vấn</div>
                            <div class="section-divider education-divider"></div>
                            <div class="section-content education-content">
                                <p><strong>{{$data["school-1"]}}</strong><br>{{$data["des-school-1"]}}</p>
                                <p><strong>{{$data["school-2"]}}</strong><br>{{$data["des-school-2"]}}</p>
                            </div>
                            <div class="section-title experience-title">Kinh Nghiệm</div>
                            <div class="section-divider experience-divider"></div>
                            <div class="section-content experience-content">
                                <p><strong>{{$data["company-name-1"]}}</strong><br>{{$data["position-1"]}}<br>{{$data["pos-des-1"]}}</p>
                                <p><strong>{{$data["company-name-2"]}}</strong><br>{{$data["position-2"]}}<br>{{$data["pos-des-2"]}}</p>
                            </div>
                            <div class="section-title skills-title">Kỹ Năng</div>
                            <div class="section-divider skills-divider"></div>
                            <div class="section-content skills-content">
                                <p><strong>{{$data["skill-1"]}}</strong><br>{{$data["skill-2"]}}</p>
                            </div>
                            <div class="section-title achievements-title">Thành Tựu</div>
                            <div class="section-divider achievements-divider"></div>
                            <div class="section-content achievements-content">
                                <p><strong>{{$data["certificate"]}}</strong></p>
                            </div>
                        </div>
                        <div class="cv-footer"></div>
                    </div>
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</body>

</html>
