<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị Quảng Bá - Trường Đại Học Thương Mại</title>
    <link href="css/giaodien.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo-container">
                <img src="https://tmu.edu.vn/template_dhtm/images/logo-sm.png" alt="Logo trường" class="logo">
                <div class="logo-text">TRƯỜNG ĐẠI HỌC THƯƠNG MẠI</div>
            </div>
            
            <div class="menu-item active" onclick="activateMenuItem(this)">
        <div class="menu-icon"><i class="fas fa-home"></i></div>
        <a href="giaodien.php" style="text-decoration: none; color: inherit;">
        <div>Trang chủ</div>
    </a>
                
            </div>
            <div class="menu-item" onclick="activateMenuItem(this)">
        <div class="menu-icon"><i class="fas fa-newspaper"></i></div>
        <a href="../tintuc/amindtt/baivietlist.php" style="text-decoration: none; color: inherit;">
        <div>Tin tức & Sự kiện</div>
    </a>
            </div>
        <div class="menu-item" onclick="activateMenuItem(this)">
        <div class="menu-icon"><i class="fas fa-graduation-cap"></i></div>
        <a href="../tuyensinh/backendts/indexts.php" style="text-decoration: none; color: inherit;">
        <div>Tuyển sinh</div>
    </a>
            </div>
            <div class="menu-item" onclick="activateMenuItem(this)">
        <div class="menu-icon"><i class="fas fa-book"></i></div>
        <a href="../daotao/viu/index.php" style="text-decoration: none; color: inherit;">
        <div>Đào tạo</div>
    </a>
            </div>
           
<div class="menu-item" onclick="handleLogout()">
    <div class="menu-icon"><i class="fas fa-sign-out-alt"></i></div>
    <div>Đăng xuất</div>
</div>
<script>
function handleLogout() {
    if(confirm('Bạn có chắc chắn muốn đăng xuất không?')) {
        window.location.href = 'logout.php';
    }
}
</script>
        </div>
        
        <div class="main-content">
            <div class="top-bar">
                <div class="page-title">Quản lý nội dung </div>
                <div class="user-menu" onclick="toggleUserDropdown()">
                    <div class="user-avatar">A</div>
                    <div class="user-name">Admin</div>
                    <div><i class="fas fa-chevron-down"></i></div>
                    
                    <div class="user-dropdown" id="userDropdown">
                        <div class="dropdown-item"><i class="fas fa-user-circle mr-2"></i> Hồ sơ</div>
                        <div class="dropdown-item"><i class="fas fa-cog mr-2"></i> Cài đặt</div>
                        <div class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i> Đăng xuất</div>
                    </div>
                </div>
            </div>
            
            <div class="dashboard-stats">
                <div class="stat-card" onclick="showDetailModal('Tổng số bài viết', 'Số bài viết đã tăng 15% trong tháng này.')">
                    <div class="stat-title">Tổng số bài viết</div>
                    <div class="stat-value">142</div>
                </div>
                <div class="stat-card" onclick="showDetailModal('Lượt truy cập tháng', 'Tăng 22% so với tháng trước.')">
                    <div class="stat-title">Lượt truy cập tháng</div>
                    <div class="stat-value">28,456</div>
                </div>
                <div class="stat-card" onclick="showDetailModal('Tương tác mạng xã hội', 'Facebook: 3,420, Instagram: 1,892, LinkedIn: 470')">
                    <div class="stat-title">Tương tác mạng xã hội</div>
                    <div class="stat-value">5,782</div>
                </div>
                <div class="stat-card" onclick="showDetailModal('Lượt đăng ký thông tin', '75% đăng ký từ trang tuyển sinh')">
                    <div class="stat-title">Lượt đăng ký thông tin</div>
                    <div class="stat-value">324</div>
                </div>
            </div>
            
            <div class="content-area">
                <div class="content-title">
                    <span>Tin tức & Sự kiện</span>
                    <div class="content-actions">
                    <a href="../tintuc/amindtt/baivietlist.php" style="text-decoration: none; color: inherit;">    
                    <button class="btn btn-primary" onclick="showCreatePostModal()"><i class="fas fa-plus mr-2"></i> Tạo bài viết mới</button>
                    </div>
                </div>
                
                <div class="tabs">
                    <div class="tab active" onclick="activateTab(this)">Tất cả</div>
                    
                </div>
                
                <div class="filter-bar">
                    <select class="filter-select" onchange="filterContent(this.value)">
                        <option value="">Tất cả danh mục</option>
                        <option value="tin-tuc">Tin tức</option>
                        <option value="su-kien">Sự kiện</option>
                        <option value="thong-bao">Thông báo</option>
                        <option value="hoat-dong">Hoạt động</option>
                    </select>
                    
                    <select class="filter-select" onchange="sortContent(this.value)">
                        <option value="">Sắp xếp theo</option>
                        <option value="newest">Mới nhất</option>
                        <option value="oldest">Cũ nhất</option>
                        <option value="views">Lượt xem</option>
                        <option value="name">Tên A-Z</option>
                    </select>
                </div>
                
                
                <table>
                    <thead>
                        <tr>
                            <th style="width: 100px">Hình ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Danh mục</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Lượt xem</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="https://th.bing.com/th/id/OIP.dDpeCGgGlKP-iKgt1ocjuQHaE8?w=305&h=203&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Thumbnail" class="preview-thumbnail"></td>
                            <td>Hội nghị Công chức, Viên chức và Người lao động năm học 2024-2025</td>
                            <td>Sự kiện</td>
                            <td>15/04/2025</td>
                            <td><span class="status-badge status-published">Đã xuất bản</span></td>
                            <td>1,245</td>
                            <td>
                             <a href="../tintuc/amindtt/baivietlist.php" style="text-decoration: none;">
                            <button class="action-btn edit-btn">
                                <i class="fas fa-edit"></i>Chỉnh Sửa
                                </button>
                                    </a>
                                </td>
                        </tr>
                        <tr>
                            <td><img src="https://upload.wikimedia.org/wikipedia/vi/2/2a/Logo_%C4%90%E1%BA%A1i_h%E1%BB%8Dc_Th%C6%B0%C6%A1ng_m%E1%BA%A1i.jpg" alt="Thumbnail" class="preview-thumbnail"></td>
                            <td>Chào mừng ngày Nhà giáo Việt Nam 20/11</td>
                            <td>Sự kiện</td>
                            <td>10/04/2025</td>
                            <td><span class="status-badge status-published">Đã xuất bản</span></td>
                            <td>2,189</td>
                            <td>
                        <a href="../tintuc/amindtt/baivietlist.php" style="text-decoration: none;">
                    <button class="action-btn edit-btn">
            <i class="fas fa-edit"></i>Chỉnh Sửa
                    </button>
                    </a>
                    </td>
                        </tr>
                        <tr>
                            <td><img src="https://th.bing.com/th/id/OIP.MzE9FftPIlkjgP9DtuJLOwHaFW?w=229&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Thumbnail" class="preview-thumbnail"></td>
                            <td>Lễ Khai giảng Đào tạo Từ xa Khoá 7</td>
                            <td>Sự kiện</td>
                            <td>08/04/2025</td>
                            <td><span class="status-badge status-scheduled">Đã lên lịch</span></td>
                            <td></td>
                            <td>
    
        <button class="action-btn edit-btn">
            <i class="fas fa-edit"><a href="../tintuc/amindtt/baivietlist.php" style="text-decoration: none;">Chỉnh Sửa</i>
        </button>
    </a>
</td>
                       
                       
    
</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="pagination">
                    <button class="page-btn">«</button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn">»</button>
                </div>
            </div>
            
            <div class="content-area">
                <div class="content-title">
                    <span>Thông tin tuyển sinh nổi bật</span>
                    <div class="content-actions">
                        <button class="btn btn-primary" onclick="showAddInfoModal()"><i class="fas fa-plus mr-2"></i> Thêm thông tin</button>
                        <a href="../tuyensinh/backendts/indexts.php" style="text-decoration: none; color: inherit;">

                    </div>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            
                            <th>Phương thức </th>
                            <th>Đề án </th>
                            <th>Bản tin</th>
                            <th>Lượt xem</th>
                