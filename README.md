# Docker Webserver Project (PHP + Nginx + MySQL)

## Yêu cầu
- Docker Desktop.

## Cách chạy
1. Vào thư mục: cd docker-webserver<br/>
2. Build và chạy: docker-compose up -d --build<br/>
3. Truy cập: http://localhost:8000 (website), http://localhost:8080 (phpMyAdmin)<br/>
4. Truy cập http://localhost:8000/live-score/ để check kết quả, nếu lỗi hãy update như sau:<br/>
   a. rm -rf www/wp-content/cache/acorn/framework/views/*<br/>
   b. Save http://localhost:8000/wp-admin/options-permalink.php<br/>
   c. Nếu ko có style của taildwincss update các lệnh sau:<br/><br/>
     - cd www/wp-content/themes/sage-theme
     - rm -rf node_modules package-lock.json yarn.lock
     - nvm install 20
     - nvm use 20
     - yarn install
     - yarn build<br/>
6. Tắt: docker-compose down
