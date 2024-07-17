<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Code Generator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>HTML Code Generator</h1>
        <form id="generatorForm" method="POST">
            <label for="element">Choose Element:</label>
            <select id="element" name="element">
                <option value="p">Paragraph</option>
                <option value="h1">Heading 1</option>
                <option value="h2">Heading 2</option>
                <option value="h3">Heading 3</option>
                <option value="h4">Heading 4</option>
                <option value="h5">Heading 5</option>
                <option value="h6">Heading 6</option>
                <option value="div">Div</option>
                <option value="form">Form</option>
                <option value="img">Image</option>
                <option value="a">Link</option>
                <option value="table">Table</option>
                <option value="list">List</option>
                <option value="iframe">Iframe</option>
            </select>

            <div id="formOptions" style="display: none;">
                <label for="fieldName">Field Name:</label>
                <input type="text" id="fieldName" name="fieldName" placeholder="Field Name">
                
                <label for="fieldType">Field Type:</label>
                <select id="fieldType" name="fieldType">
                    <option value="text">Text</option>
                    <option value="email">Email</option>
                    <option value="password">Password</option>
                    <option value="number">Number</option>
                    <option value="date">Date</option>
                </select>
                
                <button type="button" id="addField">Add Field</button>
                
                <div id="fieldsContainer"></div>
            </div>

            <div id="imageOptions" style="display: none;">
                <label for="imageUrl">Image URL:</label>
                <input type="text" id="imageUrl" name="imageUrl" placeholder="Enter image URL or browse">
                <input type="file" id="imageFile" name="imageFile">
            </div>

            <div id="linkOptions" style="display: none;">
                <label for="linkUrl">Link URL:</label>
                <input type="text" id="linkUrl" name="linkUrl" placeholder="Enter link URL or browse">
            </div>

            <div id="tableOptions" style="display: none;">
                <label for="tableRows">Number of Rows:</label>
                <input type="number" id="tableRows" name="tableRows" placeholder="Number of Rows">
                
                <label for="tableCols">Number of Columns:</label>
                <input type="number" id="tableCols" name="tableCols" placeholder="Number of Columns">
            </div>

            <div id="listOptions" style="display: none;">
                <label for="listItems">List Items (Comma separated):</label>
                <input type="text" id="listItems" name="listItems" placeholder="Item 1, Item 2, Item 3">
            </div>

            <div id="iframeOptions" style="display: none;">
                <label for="iframeUrl">Iframe URL:</label>
                <input type="text" id="iframeUrl" name="iframeUrl" placeholder="Enter iframe URL">
                
                <label for="iframeWidth">Iframe Width:</label>
                <input type="text" id="iframeWidth" name="iframeWidth" placeholder="Width (e.g., 600px)">
                
                <label for="iframeHeight">Iframe Height:</label>
                <input type="text" id="iframeHeight" name="iframeHeight" placeholder="Height (e.g., 400px)">
            </div>

            <label for="content">Content:</label>
            <input type="text" id="content" name="content" placeholder="Enter content">

            <label for="fontSize">Font Size:</label>
            <input type="number" id="fontSize" name="fontSize" placeholder="16">

            <label for="color">Font Color:</label>
            <input type="color" id="color" name="color">

            <label for="bgColor">Background Color:</label>
            <input type="color" id="bgColor" name="bgColor">

            <button type="submit" name="generate">Generate Code</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $element = $_POST['element'];
            $content = $_POST['content'];
            $fontSize = $_POST['fontSize'];
            $color = $_POST['color'];
            $bgColor = $_POST['bgColor'];
            $formFields = isset($_POST['formFields']) ? $_POST['formFields'] : [];
            $imageUrl = $_POST['imageUrl'] ?? '';
            $linkUrl = $_POST['linkUrl'] ?? '';
            $tableRows = $_POST['tableRows'] ?? 0;
            $tableCols = $_POST['tableCols'] ?? 0;
            $listItems = $_POST['listItems'] ?? '';
            $iframeUrl = $_POST['iframeUrl'] ?? '';
            $iframeWidth = $_POST['iframeWidth'] ?? '';
            $iframeHeight = $_POST['iframeHeight'] ?? '';

            echo "<h2>Generated Code:</h2>";
            echo "<textarea id='generatedCode' rows='10' cols='50'>";

            if ($element === 'form') {
                echo "&lt;form style='font-size:{$fontSize}px; color:{$color}; background-color:{$bgColor};'&gt;\n";
                foreach ($formFields as $field) {
                    list($fieldName, $fieldType) = explode(':', $field);
                    echo "    &lt;label for='{$fieldName}'&gt;{$fieldName}&lt;/label&gt;\n";
                    echo "    &lt;input type='{$fieldType}' id='{$fieldName}' name='{$fieldName}'&gt;\n";
                }
                echo "&lt;/form&gt;";
            } elseif ($element === 'img') {
                echo "&lt;img src='{$imageUrl}' alt='Image' style='font-size:{$fontSize}px; color:{$color}; background-color:{$bgColor};'&gt;";
            } elseif ($element === 'a') {
                echo "&lt;a href='{$linkUrl}' style='font-size:{$fontSize}px; color:{$color}; background-color:{$bgColor};'&gt;{$content}&lt;/a&gt;";
            } elseif ($element === 'table') {
                echo "&lt;table style='font-size:{$fontSize}px; color:{$color}; background-color:{$bgColor};'&gt;\n";
                for ($i = 0; $i < $tableRows; $i++) {
                    echo "    &lt;tr&gt;\n";
                    for ($j = 0; $j < $tableCols; $j++) {
                        echo "        &lt;td&gt;Cell&lt;/td&gt;\n";
                    }
                    echo "    &lt;/tr&gt;\n";
                }
                echo "&lt;/table&gt;";
            } elseif ($element === 'list') {
                $items = explode(',', $listItems);
                echo "&lt;ul style='font-size:{$fontSize}px; color:{$color}; background-color:{$bgColor};'&gt;\n";
                foreach ($items as $item) {
                    echo "    &lt;li&gt;{$item}&lt;/li&gt;\n";
                }
                echo "&lt;/ul&gt;";
            } elseif ($element === 'iframe') {
                echo "&lt;iframe src='{$iframeUrl}' width='{$iframeWidth}' height='{$iframeHeight}' style='font-size:{$fontSize}px; color:{$color}; background-color:{$bgColor};'&gt;&lt;/iframe&gt;";
            } else {
                echo "&lt;{$element} style='font-size:{$fontSize}px; color:{$color}; background-color:{$bgColor};'&gt;{$content}&lt;/{$element}&gt;";
            }

            echo "</textarea>";
        }
        ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
