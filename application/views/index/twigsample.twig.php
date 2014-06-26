Hello {{ name }}!
<h1>List</h1>
<ul>
    {% for user in users %}
        <li>{{ user.name|e }}</li>
    {% endfor %}
</ul>
<br>
{% set urlParams = {"controller" : "index", "action" : "index"} %}
<a href="{{ Url.get( urlParams ) }}" >Go back</a>
<br>
