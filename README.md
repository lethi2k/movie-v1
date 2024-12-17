## cách đặt tên và phân luồng router

- commet rõ ràng sau mỗi khối sử dụng
- group các chức năng dùng chung vào 1 khối và đặt tên theo chức năng của khối
- đặt tên khối trùng với tên class hoặc forder từ controller
- đặt tên router trùng với tên function phía controller

## Về quy tắc chung và nguyên tắc

- Khi làm việc tuân thủ chặt chẽ theo cấu trúc thư mục và tổ chức code rõ ràng tránh việc code theo suy nghĩ

- khi code song phần nào update code lên git đặt tên bằng tiếng anh hoặc tiếng việt không dấu về đoạn code mình đang làm phần nào có chức năng gì đặt commit có ý nghĩa và kèm theo tên của người commit (vd: thi - update html login)

- Theo mình mỗi người nên checkout ra 1 nhánh riêng để việc quản lý code dễ dàng hơn và tránh conflic 

- Khi code song sẽ được review lại đoạn code đó không sạch hoặc không tuân thủ cấu trúc thì phải code lại cho đúng 

##  Gitflow

Tất cả branch mới được phải được tạo ra từ branch master

Branch mới được tạo để phát triển một tính năng thì tên phải bắt đầu bằng feature/. VD như: feature/login

Branch mới được tạo để fix bug thì tên phải bắt đầu bằng fixbug/.

Sau khi code xong thì phải tạo Pull request vào branch master.

##  Tài liệu tham khảo

<a href="https://viblo.asia/p/coding-conventions-va-cac-chuan-viet-code-trong-php-naQZRbrGZvx">Coding Conventions và các chuẩn viết code trong PHP</a>

<a href="https://topdev.vn/blog/code-php-lam-sao-cho-sach-khong-co-mui/">Code PHP làm sao cho sạch (Phần 1)</a>

<a href="https://topdev.vn/blog/code-php-lam-sao-cho-sach-phan-2/">Code PHP làm sao cho sạch (Phần 2)</a>
