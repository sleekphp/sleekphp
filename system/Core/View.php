<?php

namespace System\Core;

class View {
    public static function make($view, $data = []) {
        $viewPath = __DIR__ . "/../../app/Views/{$view}.php";
        if (!file_exists($viewPath)) {
            throw new \Exception("View file does not exist: {$viewPath}");
        }

        extract($data);
        $viewContent = file_get_contents($viewPath);
        $parsedContent = self::parseDirectives($viewContent);
        eval("?> $parsedContent <?php ");
    }

    private static function parseDirectives($content) {
        $content = self::parseEchos($content);
        $content = self::parseIfStatements($content);
        $content = self::parseForeachStatements($content);
        $content = self::parseIncludes($content);
        return $content;
    }

    private static function parseEchos($content) {
        return preg_replace('/\{\{\s*(.+?)\s*\}\}/', '<?php echo htmlentities($1); ?>', $content);
    }

    private static function parseIfStatements($content) {
        $content = preg_replace('/@if\s*\((.+?)\)/', '<?php if ($1): ?>', $content);
        $content = preg_replace('/@elseif\s*\((.+?)\)/', '<?php elseif ($1): ?>', $content);
        $content = preg_replace('/@else/', '<?php else: ?>', $content);
        $content = preg_replace('/@endif/', '<?php endif; ?>', $content);
        return $content;
    }

    private static function parseForeachStatements($content) {
        $content = preg_replace('/@foreach\s*\((.+?)\)/', '<?php foreach ($1): ?>', $content);
        $content = preg_replace('/@endforeach/', '<?php endforeach; ?>', $content);
        return $content;
    }

    private static function parseIncludes($content) {
        return preg_replace_callback('/@include\s*\(\s*[\'"](.+?)[\'"]\s*\)/', function ($matches) {
            $includedViewPath = __DIR__ . "/../../app/Views/{$matches[1]}.php";
            if (file_exists($includedViewPath)) {
                return file_get_contents($includedViewPath);
            } else {
                throw new \Exception("Included view file does not exist: {$matches[1]}");
            }
        }, $content);
    }
}
