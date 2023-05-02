<?php

class WebPage
{
    private string $head = "";
    private string $title = "";
    private string $body = "";


    /**
     * Constructeur de la classe
     * Initialise le titre avec celui passé en paramètre.
     */
    public function __construct(string $title = "")
    {
        $this->title = $title;
    }

    /**
     * Accesseur de l'attribut Head
     * @return string head
     */
    public function getHead(): string
    {
        return $this->head;
    }

    /**
     * Accesseur de l'attribut title
     * @return string title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Modificateur du titre de la page
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Accesseur de l'attribut body
     * @return string body
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Extension de la partie head avec :
     * @param string $content
     * @return void ne retourne rien.
     */
    public function appendToHead(string $content)
    {
        $this->head .= "$content";
    }

    /**
     * Ajout d'un contenu css à l'aide de style dans head :
     * @param string $css
     * @return void
     */
    public function appendCss(string $css)
    {
        $this->appendToHead("<style>$css</style>");
    }

    /**
     * Ajout d'un lien vers une feuille de style css dans head :
     * @param string $css
     * @return void
     */
    public function appendCssUrl(string $url)
    {
        $this->appendToHead("<link rel='stylesheet' type='text/css' href='$url'>");
    }

    /**
     * Ajout d'un contenu js à l'aide de script dans head :
     * @param string $js
     * @return void
     */
    public function appendJs(string $js)
    {
        $this->appendToHead("<script>$js</script>");
    }

    /**
     * Ajout d'un lien vers une feuille de script js dans head :
     * @param string $css
     * @return void
     */
    public function appendJsUrl(string $url)
    {
        $this->appendToHead("<script src='$url'></script>");
    }

    /**
     * Ajout d'un contenu dans body :
     * @param string $content
     * @return void ne retourne rien.
     */
    public function appendContent(string $content)
    {
        $this->body .= "$content";
    }

    /**
     * Création du document html à partir des paramètres
     * @return string page html
     */
    public function toHTML(): string
    {
        $date=WebPage::getLastModification();
        $css= <<<CSS
            footer
            {
                display:flex;
            }
            DateModif
            {
                font-style: italic;
                font-size: small;
            }
        CSS;
        $html= <<<HTML
        <!DOCTYPE html>
        <html lang="fr">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                $this->head
                <style>$css</style>
            <title>$this->title</title>
            </head>
            <body>
                $this->body
            </body>
            <footer>
                <DateModif>Dernière modification de cette page le $date</DateModif>
            </footer>
        </html>
        HTML;
        return $html;
    }

    /**
     * Méthode escapeString, permet de modifier la chaîne de caractère passée en paramètre
     * Pour enlever tous les caractères pouvant nuire à la page html
     *
     * @param string $string
     * @return string
     */
    public function escapeString(string $string):string
    {
        return htmlspecialchars($string,  ENT_QUOTES | ENT_IGNORE | ENT_HTML5);
    }

    /**
     * Méthode Statique renvoyant la date de dernière modification du script principale
     * @return string
     */
    public static function getLastModification():string
    {
        $LastModif=getlastmod();
        if ($LastModif==False)
        {
            $res="Erreur!";
        }
        else
        {
            $res=date ("d/m/Y \à H:i:s", getlastmod());
        }
        return $res;
    }
}