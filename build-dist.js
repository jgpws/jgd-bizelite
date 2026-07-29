/* Script to copy theme distribution ready files to dist folder */
const fs = require("fs");
const path = require("path");
const { execSync } = require("child_process");

const srcDir = __dirname;
const destDir = path.join(__dirname, "dist");

// Files and folders to strictly ignore
const excludeList = [
  "node_modules",
  ".git",
  "dist",
  "original",
  "sass",
  ".gitignore",
  "gulpfile.js",
  "package.json",
  "package-lock.json",
  "README.md",
  "build-dist.js", // Exclude this script itself
  "clean-maps.js",
  "zip-theme.js",
];

// Clean and recreate the dist folder
if (fs.existsSync(destDir)) {
  fs.rmSync(destDir, { recursive: true, force: true });
}
fs.mkdirSync(destDir, { recursive: true });

function copyRecursive(src, dest) {
  const exists = fs.existsSync(src);
  const stats = exists && fs.statSync(src);
  const isDirectory = exists && stats.isDirectory();

  if (isDirectory) {
    fs.mkdirSync(dest, { recursive: true });
    fs.readdirSync(src).forEach((childItemName) => {
      // Skip anything on the exclude list at the root level
      if (src === srcDir && excludeList.includes(childItemName)) {
        return;
      }
      copyRecursive(
        path.join(src, childItemName),
        path.join(dest, childItemName),
      );
    });
  } else {
    fs.copyFileSync(src, dest);
  }
}

console.log("📦 Building dist folder...");
copyRecursive(srcDir, destDir);
console.log("✅ Dist folder ready with only production files!");

try {
  console.log("Cleaning up source maps...");
  // Resolves the absolute path to your clean-maps.js script
  const scriptPath = path.resolve(__dirname, "clean-maps.js");

  // Executes the script cross-platform
  execSync(`node "${scriptPath}"`, { stdio: "inherit" });
} catch (error) {
  console.error("Failed to clean source maps:", error);
}
