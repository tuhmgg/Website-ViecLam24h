<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $cvData['name'] ?? 'Họ và tên' }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.6;
        }
        .cv-container {
            max-width: 210mm;
            margin: 0 auto;
            background: #fff;
        }
        .cv-header {
            background: #18344a;
            color: white;
            padding: 30px;
            text-align: center;
        }
        .cv-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid white;
            margin: 0 auto 20px;
            display: block;
            background: #f8f9fa;
        }
        .cv-name {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .cv-position {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 15px;
        }
        .cv-contact {
            font-size: 12px;
            margin-bottom: 5px;
        }
        .cv-main {
            padding: 30px;
        }
        .cv-section {
            margin-bottom: 25px;
        }
        .cv-section-title {
            font-size: 18px;
            font-weight: bold;
            color: #18344a;
            border-bottom: 2px solid #18344a;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
        .cv-about {
            text-align: justify;
            margin-bottom: 20px;
        }
        .cv-list {
            margin: 0;
            padding-left: 20px;
        }
        .cv-list li {
            margin-bottom: 8px;
        }
        .cv-item {
            margin-bottom: 15px;
        }
        .cv-item-title {
            font-weight: bold;
            color: #18344a;
        }
        .cv-item-subtitle {
            font-style: italic;
            color: #666;
            margin-bottom: 5px;
        }
        .cv-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .cv-skill {
            background: #f8f9fa;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            border: 1px solid #dee2e6;
        }
        .cv-footer {
            text-align: center;
            padding: 20px;
            color: #666;
            font-size: 12px;
            border-top: 1px solid #eee;
            margin-top: 30px;
        }
        @page {
            margin: 0;
            size: A4;
        }
    </style>
</head>
<body>
    <div class="cv-container">
        <!-- Header -->
        <div class="cv-header">
            @if(isset($cvData['avatar']) && $cvData['avatar'])
                <img src="{{ $cvData['avatar'] }}" class="cv-avatar" alt="Avatar">
            @endif
            <div class="cv-name">{{ $cvData['name'] ?? 'Họ và tên' }}</div>
            <div class="cv-position">{{ $cvData['position'] ?? 'Vị trí ứng tuyển' }}</div>
            
            @if(isset($cvData['phone']) && $cvData['phone'])
                <div class="cv-contact">📞 {{ $cvData['phone'] }}</div>
            @endif
            @if(isset($cvData['email']) && $cvData['email'])
                <div class="cv-contact">✉️ {{ $cvData['email'] }}</div>
            @endif
            @if(isset($cvData['birthday']) && $cvData['birthday'])
                <div class="cv-contact">📅 {{ $cvData['birthday'] }}</div>
            @endif
            @if(isset($cvData['gender']) && $cvData['gender'])
                <div class="cv-contact">👤 {{ $cvData['gender'] }}</div>
            @endif
            @if(isset($cvData['address']) && $cvData['address'])
                <div class="cv-contact">📍 {{ $cvData['address'] }}</div>
            @endif
        </div>

        <!-- Main Content -->
        <div class="cv-main">
            @if(isset($cvData['about']) && $cvData['about'])
                <div class="cv-section">
                    <div class="cv-section-title">Giới thiệu bản thân</div>
                    <div class="cv-about">{{ $cvData['about'] }}</div>
                </div>
            @endif

            @if(isset($cvData['education']) && is_array($cvData['education']) && count($cvData['education']) > 0)
                <div class="cv-section">
                    <div class="cv-section-title">Học vấn</div>
                    <ul class="cv-list">
                        @foreach($cvData['education'] as $edu)
                            @if(isset($edu['school']) && $edu['school'])
                                <li>
                                    <div class="cv-item-title">{{ $edu['school'] }}</div>
                                    @if(isset($edu['year']) && $edu['year'])
                                        <div class="cv-item-subtitle">{{ $edu['year'] }}</div>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(isset($cvData['experience']) && is_array($cvData['experience']) && count($cvData['experience']) > 0)
                <div class="cv-section">
                    <div class="cv-section-title">Kinh nghiệm làm việc</div>
                    <ul class="cv-list">
                        @foreach($cvData['experience'] as $exp)
                            @if(isset($exp['company']) && $exp['company'] && isset($exp['role']) && $exp['role'])
                                <li>
                                    <div class="cv-item-title">{{ $exp['company'] }} - {{ $exp['role'] }}</div>
                                    @if(isset($exp['year']) && $exp['year'])
                                        <div class="cv-item-subtitle">{{ $exp['year'] }}</div>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(isset($cvData['skills']) && $cvData['skills'])
                <div class="cv-section">
                    <div class="cv-section-title">Kỹ năng</div>
                    <div class="cv-skills">
                        @php
                            $skills = explode(',', $cvData['skills']);
                        @endphp
                        @foreach($skills as $skill)
                            @if(trim($skill))
                                <span class="cv-skill">{{ trim($skill) }}</span>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            @if(isset($cvData['certificates']) && is_array($cvData['certificates']) && count($cvData['certificates']) > 0)
                <div class="cv-section">
                    <div class="cv-section-title">Chứng chỉ/Giải thưởng</div>
                    <ul class="cv-list">
                        @foreach($cvData['certificates'] as $cert)
                            @if(isset($cert['name']) && $cert['name'])
                                <li>{{ $cert['name'] }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(isset($cvData['hobbies']) && is_array($cvData['hobbies']) && count($cvData['hobbies']) > 0)
                <div class="cv-section">
                    <div class="cv-section-title">Sở thích</div>
                    <ul class="cv-list">
                        @foreach($cvData['hobbies'] as $hobby)
                            @if(isset($hobby['name']) && $hobby['name'])
                                <li>{{ $hobby['name'] }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="cv-footer">
            Tạo bởi ViecLam24h - {{ date('Y') }}
        </div>
    </div>
</body>
</html> 