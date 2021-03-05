Partials using link must use root relative references, starting with '/' and going through directory CMS_Projekt_Grupp8.<br>
Example: using root relative link to the login page will look like &lt;a href="/CMS_Projekt_Grupp8/views/login.php"&gt;Login&lt;/a&gt;.<br>
Reason: This way partials using links can be used independent of the hierarchical level of the file using the partial.<br>
<br>
Partials using tags must enclose those tags within those partials.<br>
Example: if a partial contains <head> it must also contain the ending tag </head>.<br>
<br>
Don't use HTML-elements as CSS selectors. Use classes or ID's instead.<br>
Example: .heading {color:red} or #heading {text:red} instead of h1 {text:red}.<br>
<br>
Use semantic HTML when more suitable.<br>
Example: &lt;header&gt;&lt;h1&gt;&lt;/h1&gt;&lt;nav&gt;&lt;/nav&gt;&lt;/header&gt; instead of &lt;div&gt;&lt;h1&gt;&lt;/h1&gt;&lt;div&gt;&lt;/div&gt;&lt;/div&gt;<br>
