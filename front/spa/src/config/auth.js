import axios from "./axios"

(function() {
     const token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MSwiZW1haWwiOiJnaWxzb25jLnJlaXNAZ21haWwuY29tIn0.Vtb4R2spNXqRL8ga7tljKIZMj-3VbfFQAQYixMwlGw8eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MSwiZW1haWwiOiJnaWxzb25jLnJlaXNAZ21haWwuY29tIn0.Vtb4R2spNXqRL8ga7tljKIZMj-3VbfFQAQYixMwlGw8';
     if (token) {
         axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
     } else {
         axios.defaults.headers.common['Authorization'] = null;
     }
})();
