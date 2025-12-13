# Docker Webserver Project (PHP + Nginx + MySQL)

## Yêu cầu
- Docker Desktop.

## Cách chạy
1. Vào thư mục: cd docker-webserver<br/>
2. Build và chạy: docker-compose up -d --build<br/>
3. Truy cập: http://localhost:8000 (website), http://localhost:8080 (phpMyAdmin)<br/>
   a. Install wordpress<br/>
   b. Active theme Sage<br/><br/>
4. Import 4 tables vào database<br/>
   a. Create www/file soccer_tables.sql file<br/>
   b. Truy cập: http://localhost:8080<br/>
      Đăng nhập:<br/>
      Server: mysql<br/>
      User: wpuser<br/>
      Pass: wppass123<br/>
      Chọn database: wordpress<br/>
      Chọn tab Import → Chọn file soccer_tables.sql<br/>
      Import!<br/><br/>
5. Tạo dữ liệu mẫu để domo sau khi khởi tạo docker thành công bằng Laravel Seeder.<br/>
   a. docker compse exec php sh<br/>
   a. cd wp-content/themes/sage-theme<br/>
   b. php database/seeders/SoccerSeeder.php<br/><br/>
6. Tạo các model và component trong theme sage sử dụng Sage để tương tác với cơ sở dữ liệu.<br/>
   a. Create 4 Models<br/>
     - app/Models/SoccerCountry.php<br/>
     - app/Models/SoccerCompetition.php<br/>
     - app/Models/SoccerTeam.php<br/>
     - app/Models/SoccerMatch.php<br/>
   b. Update app/setup.php<br/>
   c. Create controller app/Http/Controllers/LiveScoreController.php<br/><br/>
 
7. Truy cập http://localhost:8000/live-score/ để check kết quả, nếu lỗi hãy update như sau:<br/>
   a. rm -rf www/wp-content/cache/acorn/framework/views/*<br/>
   b. Save http://localhost:8000/wp-admin/options-permalink.php<br/>
   c. Nếu ko có style của taildwincss update các lệnh sau:<br/><br/>
     - cd www/wp-content/themes/sage-theme
     - rm -rf node_modules package-lock.json yarn.lock
     - nvm install 20
     - nvm use 20
     - yarn install
     - yarn build<br/><br/>
8. Tắt: docker-compose down
