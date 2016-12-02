<?php

class view
{
    /**
     * Görünüm dosyasını yorumlayan metod
     * @param string $view görünüm dosyası
     * @param array $params parametreler
     */
    public static function render($view, array $params = [])
    {
        /**
         * Eğer dosya varsa
         */
        if (file_exists($file = VDIR."/{$view}.php")) {
            /**
             * $params dizesindeki verileri extract fonksiyonu
             * ile değişken haline döndürüyoruz
             */
            extract($params);

            /**
             * Çıktı tamponlamasını başlatıyoruz
             */
            ob_start();

            /**
             * View dosyası içeriğini çağırıyoruz
             */
            require $file;

            /**
             * Çıktı tamponun içeriğini döndürüp siliyoruz
             */
            echo ob_get_clean();
        /**
         * Dosya yoksa programı sonlandır
         */
        } else {
            exit("Görünüm dosyası bulunamadı: $view");
        }
    }
}
