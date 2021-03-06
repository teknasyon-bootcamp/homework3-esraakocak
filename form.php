<?php

/**
 * UML diyagramında yer alan Form sınıfını oluşturmanız beklenmekte.
 * 
 * Sınıf içerisinde static olmayan `fields`, `action` ve `method`
 * özellikleri (property) olması gerekiyor.
 * 
 * Sınıf içerisinde static olan ve Form nesnesi döndüren `createPostForm`,
 * `createGetForm` ve `createForm` methodları bulunmalı. Bu metodlar isminde de
 * belirtilen metodlarda Form nesneleri oluşturmalı.
 * 
 * Sınıf içerisinde bir "private" başlatıcı (constructor) bulunmalı. Bu başlatıcı
 * içerisinden `action` ve `method` değerleri alınıp ilgili property'lere değerleri
 * aktarılmalıdır.
 * 
 * Sınıf içerisinde static "olmayan" aşağıdaki metodlar bulunmalıdır.
 *   - `addField` metodu `fields` property dizisine değer eklemelidir.
 *   - `setMethod` metodu `method` propertysinin değerini değiştirmelidir.
 *   - `render` metodu form'un ilgili alanlarını HTML çıktı olarak verip bir buton çıktıya eklemelidir.
 * 
 * Sonuç ekran görüntüsüne `result.png` dosyasından veya `result.html` dosyasından ulaşabilirsiniz.
 * `app.php` çalıştırıldığında `result.html` ile aynı çıktıyı verecek şekilde geliştirme yapmalısınız.
 * 
 * > **Not: İsteyenler `app2.php` ve `form2.php` isminde dosyalar oluşturup sınıfa farklı özellikler kazandırabilir.
 */
class Form
{
   
    private string $action;
    private array $fields;
    private string $method;
  


     // constructor METODU
    function __construct(string $action, string $method)
    {
        $this->action = $action;
        $this->method = $method;
    }

    public static function createPostForm(string $action)
    {
        return self ::createForm($action,"POST");
    }
    public static function createGetForm(string $action)
    {
        return self::createForm ($action,"GET");
    }

   public static function createForm(string $action,string $method) {  //Form oluşturmak için kullanılan fonksiyon
       return new static($action,$method);
            
   }
 
   public function addField(string $label, string $name, ?string $defaultValue=null):void { //label, Name, defaultvalue değerlerini al, ama defaultvalue değeri verilmese bile varsayılan değeri null olarak al.
          $field=[$label,$name,$defaultValue];
          $this->fields[] = $field;

   }
   public function setMethod (string $method):void {
         $this->method=$method;
   }

   public function render ():void {
         
      echo " <form method='$this->method' action='$this->action' >";
      foreach ($this->fields as $field) { // 
        echo "<label for='$field[1]'>$field[0]</label> &nbsp"; 
        echo "<input type='text' name='$field[1]'  value='$field[2]' />&nbsp"; 
    }
    echo "<button type='submit'>Gönder</button>"; 
    echo "</form>"; 
}

       

   }


//   https://www.php.net/manual/tr/language.oop5.decon.php  