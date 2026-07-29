const fs = require("fs");
const path = require("path");

// Target your dist directory
const targetDir = path.resolve(__dirname, "dist/css");

function cleanStyles(dir) {
  if (!fs.existsSync(dir)) return;

  const files = fs.readdirSync(dir);

  files.forEach((file) => {
    const filePath = path.join(dir, file);
    const stat = fs.statSync(filePath);

    if (stat.isDirectory()) {
      cleanStyles(filePath); // Recursively handle subfolders
    } else if (file.endsWith(".map")) {
      fs.unlinkSync(filePath); // Delete map files
    } else if (file.endsWith(".css")) {
      // Strip out the sourceMappingURL comments
      let content = fs.readFileSync(filePath, "utf8");
      content = content.replace(/\/\*# sourceMappingURL=.*\*\//g, "");
      fs.writeFileSync(filePath, content, "utf8");
    }
  });
}

cleanStyles(targetDir);
