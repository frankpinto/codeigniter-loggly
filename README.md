![CodeIgniter](http://www.elreplicante.com.ar/wp-content/uploads/2012/05/codeigniter-logo.png)
### meets
![Loggly](http://blog.sparklehouse.com/wp-content/uploads/2011/07/cc28b733b8y-logo.jpg.jpg)

<div style="margin-top: 50px;">
This library allows you to send data to Loggly from inside CodeIgniter (i.e. controllers/models/views). Works out of the box.
</div>


## Installation
Either download and unpack the archive into application/libraries/Loggly or use git submodules. Use sudo if you're in a restricted directory.

#### Git Submodules
Run this in Terminal from your CodeIgniter root directory:

```bash
git submodule add git://github.com/frankpinto/codeigniter-loggly.git application/libraries/Loggly
git submodule init
git submodule update
```

#### Download and Unpack
Either put it in the application/libraries folder manually or run this in Terminal from your CodeIgniter root directory:

```bash
wget https://github.com/frankpinto/codeigniter-loggly/archive/master.zip
unzip master.zip
mv codeigniter-loggly-master/ Loggly
```

#### Add Loggly Key
Add your loggly key to your default config file (key below is non-working) and any custom environment config files you've created

application/config/config.php  
application/config/(development|staging|whatever)/config.php  

```php
/* Loggly config data */
$config['loggly_key'] = '83hfni39-x3j9-2918-bc4j-393ivmklwi39';
```

## Usage
From any controller action:
```php
$this->load->library('loggly');
$this->loggly->send('Hi Loggly!');
```