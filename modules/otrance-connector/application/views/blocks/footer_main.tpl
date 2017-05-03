[{$smarty.block.parent}]
<div id="otrance-connector" style="position: fixed; top: 25px; right: 25px;width: 200px;">
    <form method="post" target="_blank" id="otrance-connector-form" action="[{$oViewConf->getOtranCeUrl()}]/connector/index" accept-charset="UTF-8">
    [{assign var="aKeys" value=$oViewConf->getTranslatedKeys()}]
        <div>
        [{foreach from=$aKeys key=keyName item=translation}]
            <input type="hidden" name="oTranceKeys[[{$keyName|escape}]]" value="[{$translation|escape}]" />
        [{/foreach}]
        </div>
        <button type="submit" style="background:#7AC76C;color:black;line-height: 22px; font-size: 15px; cursor:pointer;" title="[{oxmultilang ident="TRANSLATE_USING_OTC"}]">
            <img style="float:left;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAADUgAAA1IBEAAkSgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJ7SURBVEiJtVRNiI5RFH6e537fmI2IlGbQpGlC+VlQysYkJSVRk5DZUWKjDLGwYylFWUg2FqwsLDRFKSUrjZ+SiJFBkZQU+b73PDYvvd6+O9+knLp1uufnuec551zaxv8U1S9I9pBcW+pNkutLvZ/kQKkPkOybCUCjlnwgpbQ8Ig6QPNFoNPqLojhB8rCkHQB6SF6XtAvAT5I3AEza/pFFsA3bIDkuyf9wPgNY+ztP/aDswZCkFoA+AIOSzgHoBbBE0mUAvSmlkZTS/lIfTSmNAOiVdE3S2W4AayT96OgAMBdsG5LOSbqYtXdrkruP2ceIOJ9SGkspPSK58q++lvyvkfSgKIrestkbJK3LZZQ00Wq17pa+qdFobI6IW6X5U0Rssv0EqE1RRd5Jmp0DaLfbUxWwk7afA7gI4CCABZLukBy0/bUjgO1JAJM5gN+SUhoDsMj2KZL7SjYPAvgGoJWtoNlsbomIjbnEJO/bHiL5wfY+AA3bV0mO2v4cEVdsfwfyPZgPYHEOQNJukk9sjwFYVTG9iYhlfy1etzHtMJZHUkp7JU3UFu4tgMG6f0eKSA6llFbU722vJvnC9jEAqyumqYgYtv2yHpObojm2F9ZAR0leKGmZUfIZUyTpuKQzkh52oGV5SmlbLjZXQfXlSyWdBpBqpqmIGJa0x3YfgJud4rt+FZJ2khwBUKWgSsu8aeO7AdjeWhTF7YgYBvAO3TivybQUkeyXtJHkPQDPAFyKiEu2388keRUg92POBXA0Im7Yfp17xzTxfzZ5lqT3JJ9GxJdKBa8ANG1nt5rkMMlD7Xb7ahagdFwqaTuAnlyyDMDjoijGbce0AP9LfgH8ItiW9X6OtQAAAABJRU5ErkJgggc183f73320c7859487b7c4ca8c7e56dc"/>
            translate this page
        </button>
    </form>

    <button style="background:#7AC76C;color:black;line-height: 22px; font-size: 15px; cursor:pointer; margin-top:10px;" id="updatetranslations">
        <img style="float:left;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAADUgAAA1IBEAAkSgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHtSURBVEiJzZW/axVBFIW/c+8GUWMTSExpYYwQUBQM2Bl4EF4lWqUL2GglkiaVWCmCQjrJ3xDUwsI0wT9BUBCDIqiNghh/pfPNXJtNWJf31g3yIAem2Mve79wzMzCKCIYpGyp93xi4+x13fyvp9F4NVD0DSYfM7D4wVpq/Ay4BxwEHvgBfgQcRMS9pW9LjXq+31ipBURSzwMuU0gKQI+IMMF3CAcaBk8CMmT1MKS1ExOWmBEVTOklPgfe1egDbwLcmcN8EVeWcb5UTf6+tH8DHlNJ6G4OBCSJiE7jZBtKkPV9TSaMjIyOdoRhIGnX39Yi4LcnK2pq7r7r7G0knWhtImnT35T7wwymlbkRkSYqIcWALmDKzZ5IOtk1wFFh29xVJR3bgOedORGxJkpldl7QYEaeAu8Av4HcV0nTILyR1zGzDzBYi4lMNfgOYjojzkgA+5JzPRUSvDtpdRVFcMLNr1RpwVtIGMFZ+y8yWzGzVzKJcr4HJat8us2GLdgZ4DnTKc5CZLQFTwNXyl82c81xEfO7X/0+DqsxsFTgALFbg3UFw2MM1lTQDzNbgc2WiwUO1NTCziznn+Yh4xN/bMtHU13qLJHXN7JikJymlKxHxs1Vf7T2YMLMVane5lAOpT/1VSuleK4NhaH+8yf+jP9Uy6yp593VTAAAAAElFTkSuQmCC05e11c7e25922ceaa7983fb3669042a3"/>
        update translations from oTranCe
    </button>
    [{oxscript add='$("#updatetranslations").on("click",function() { $.ajax( "'|cat:$oViewConf->getBaseDir()|cat:'otrance2oxid.php" ).done( function(data) { if(data == "ok") {  location.reload(); } else { alert("something went wrong"); } }); });'}]
</div>
