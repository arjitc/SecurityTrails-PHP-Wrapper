# SecurityTrails-PHP-Wrapper
A PHP based wrapper for SecurityTrails

Based off https://docs.securitytrails.com/reference

## Usage examples

### getDomain Details

```
<?php
require 'securitytrails.php';
$securitytrails = new SecurityTrails("YOUR_API_KEY_HERE");
$output = $securitytrails->getDomain("github.com");
var_dump($output);
?>
```

### getDNSHistory Details

```
<?php
require 'securitytrails.php';
$securitytrails = new SecurityTrails("YOUR_API_KEY_HERE");
$output = $securitytrails->getSubDomain("github.com", "a");
//eg #2: $output = $securitytrails->getSubDomain("github.com", "txt");
var_dump($output);
?>
```

## Implemented methods

### Domain

[X] Details
[X] Subdomains
[ ] Tags
[X] WHOIS
[ ] Search
[ ] Statistics
[ ] Associated domains
[ ] SSL Certificates (Pages)
[ ] SSL Certificates (Stream)

### History

[X] DNS History
[X] WHOIS History

### IPs

[X] Neighbors
[ ] Search with DSL
[ ] Statistics
[X] Whois
[X] Useragents
