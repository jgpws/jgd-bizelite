/* Script that zips the theme for distribution */
const fs = require("fs");
const path = require("path");
const { execSync } = require("child_process");

const distDir = path.join(__dirname, "dist");
const tempZip = path.join(__dirname, "jgd-bizelite.zip");
const finalZip = path.join(distDir, "jgd-bizelite.zip");

console.log("🤐 Compressing dist files into jgd-bielite.zip...");

// Clean up any old zip leftovers from previous failed runs
if (fs.existsSync(tempZip)) fs.unlinkSync(tempZip);

try {
  // Create the zip in the root directory first (so it doesn't try to zip itselft)
  if (process.platform === "win32") {
    execSync(
      `powershell Compress-Archive -Path dist/* -DestinationPath "${tempZip}" -Force`,
    );
  } else {
    execSync(`cd dist && zip -r "../jgd-bizelite.zip" ./*`);
  }

  // Clear the inside of the /dist directory without deleting the folder
  console.log("🧹 Clearing copied files from dist folder...");
  const files = fs.readdirSync(distDir);
  for (const file of files) {
    fs.rmSync(path.join(distDir, file), { recursive: true, force: true });
  }

  // Move the completed zip inside the now empty /dist folder
  fs.renameSync(tempZip, finalZip);

  console.log(
    "✅ Success! Everything cleared. Final archive is at: dist/mixin-styles-gb.zip",
  );
} catch (error) {
  console.error("❌ Failed to create or move zip file:", error.message);
  // Clean up root if it failed halfway through
  if (fs.existsSync(tempZip)) fs.unlinkSync(tempZip);
  process.exit(1);
}
