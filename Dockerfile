# Usa una imagen base de nginx
FROM nginx:alpine

# Copia los archivos de la página web al directorio donde nginx los servirá
COPY . /usr/share/nginx/html
