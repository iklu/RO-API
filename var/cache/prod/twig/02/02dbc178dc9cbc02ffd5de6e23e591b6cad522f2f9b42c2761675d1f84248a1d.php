<?php

/* ApiPlatformBundle:SwaggerUi:index.html.twig */
class __TwigTemplate_06ea390a2b3ce5c604ed52dddd169a8077f3ec681ae2f667369e5763c0d861d4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>";
        // line 5
        if (($context["title"] ?? null)) {
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo " - ";
        }
        echo "API Platform</title>

    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/css/typography.css"), "html", null, true);
        echo "\" media=\"screen\" rel=\"stylesheet\">
    <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/css/reset.css"), "html", null, true);
        echo "\" media=\"screen\" rel=\"stylesheet\">
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/css/screen.css"), "html", null, true);
        echo "\" media=\"screen\" rel=\"stylesheet\">
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/css/reset.css"), "html", null, true);
        echo "\" media=\"print\" rel=\"stylesheet\">
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/css/print.css"), "html", null, true);
        echo "\" media=\"print\" rel=\"stylesheet\">

    <script src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/lib/object-assign-pollyfill.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/lib/jquery-1.8.0.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/lib/jquery.slideto.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/lib/jquery.wiggle.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/lib/jquery.ba-bbq.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/lib/handlebars-4.0.5.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/lib/lodash.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/lib/backbone-min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/swagger-ui.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/lib/highlight.9.1.0.pack.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/lib/jsoneditor.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/lib/marked.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/swagger-ui/lib/swagger-oauth.js"), "html", null, true);
        echo "\"></script>

    <script>
        \$(function () {
            window.swaggerUi = new SwaggerUi({
                url: '";
        // line 30
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("api_doc", array("_format" => "json"));
        echo "',
                spec: ";
        // line 31
        echo twig_replace_filter(($context["spec"] ?? null), array("<" => "u003c"));
        echo ",
                dom_id: 'swagger-ui-container',
                supportedSubmitMethods: ['get', 'post', 'put', 'delete'],
                onComplete: function() {
                    \$('pre code').each(function(i, e) {
                        hljs.highlightBlock(e)
                    });

                    ";
        // line 39
        if ( !(null === ($context["operationId"] ?? null))) {
            // line 40
            echo "                        ";
            $context["domId"] = ((($context["shortName"] ?? null) . "_") . ($context["operationId"] ?? null));
            // line 41
            echo "                        ";
            $context["id"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "attributes", array()), "get", array(0 => "id"), "method");
            // line 42
            echo "
                        var queryParameters = ";
            // line 43
            echo twig_replace_filter(twig_jsonencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "query", array()), "all", array(), "method")), array("<" => "u003c"));
            echo ";
                        \$('#";
            // line 44
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, ($context["domId"] ?? null), "js"), "html", null, true);
            echo " form.sandbox input.parameter').each(function (i, e) {
                            var \$e = \$(e);
                            var name = \$e.attr('name');

                            if (name in queryParameters) {
                                \$e.val(queryParameters[name]);
                            }
                        });

                        ";
            // line 53
            if (($context["id"] ?? null)) {
                // line 54
                echo "                            \$('#";
                echo twig_escape_filter($this->env, twig_escape_filter($this->env, ($context["domId"] ?? null), "js"), "html", null, true);
                echo " form.sandbox input[name=\"id\"]').val('";
                echo twig_escape_filter($this->env, twig_escape_filter($this->env, ($context["id"] ?? null), "js"), "html", null, true);
                echo "');
                        ";
            }
            // line 56
            echo "
                        \$('#";
            // line 57
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, ($context["domId"] ?? null), "js"), "html", null, true);
            echo " form.sandbox').submit();
                        document.location.hash = '#!/";
            // line 58
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, ($context["shortName"] ?? null), "js"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, ($context["operationId"] ?? null), "js"), "html", null, true);
            echo "';
                    ";
        }
        // line 60
        echo "                },
                onFailure: function() {
                    log('Unable to Load SwaggerUI');
                },
                docExpansion: 'list',
                jsonEditor: false,
                defaultModelRendering: 'schema',
                showRequestHeaders: true
            });

            window.swaggerUi.load();

            function log() {
                if ('console' in window) {
                    console.log.apply(console, arguments);
                }
            }
        });
    </script>
</head>

<body class=\"swagger-section\">
<div id=\"header\" style=\"background-color: #253032; height: 35px\">
    <div class=\"swagger-ui-wrap\">
        <a id=\"logo\" href=\"https://api-platform.com\"><img height=\"48\" src=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/apiplatform/logo-header.svg"), "html", null, true);
        echo "\" alt=\"API Platform\" style=\"position: relative; right: 10px\"></a>
    </div>
</div>

<div id=\"message-bar\" class=\"swagger-ui-wrap\" data-sw-translate>&nbsp;</div>
<div id=\"swagger-ui-container\" class=\"swagger-ui-wrap\"></div>

<div class=\"swagger-ui-wrap\">
    <div class=\"container\">
        <div id=\"formats\" class=\"footer\" style=\"text-align: right\">
            Available formats:
            ";
        // line 95
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter(($context["formats"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["format"]) {
            // line 96
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), twig_array_merge($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method"), array("_format" => $context["format"]))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["format"], "html", null, true);
            echo "</a>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['format'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 98
        echo "        </div>
    </div>
</div>

</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "ApiPlatformBundle:SwaggerUi:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  231 => 98,  220 => 96,  216 => 95,  202 => 84,  176 => 60,  169 => 58,  165 => 57,  162 => 56,  154 => 54,  152 => 53,  140 => 44,  136 => 43,  133 => 42,  130 => 41,  127 => 40,  125 => 39,  114 => 31,  110 => 30,  102 => 25,  98 => 24,  94 => 23,  90 => 22,  86 => 21,  82 => 20,  78 => 19,  74 => 18,  70 => 17,  66 => 16,  62 => 15,  58 => 14,  54 => 13,  49 => 11,  45 => 10,  41 => 9,  37 => 8,  33 => 7,  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ApiPlatformBundle:SwaggerUi:index.html.twig", "/var/www/html/RO-API/vendor/api-platform/core/src/Bridge/Symfony/Bundle/Resources/views/SwaggerUi/index.html.twig");
    }
}
