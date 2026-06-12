<?php
require '../includes/middleware_admin.php';
require '../includes/db.php';
require '../includes/header.php';
require '../includes/sidebar.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $youtube_url = trim($_POST['youtube_url'] ?? '');

    $is_public = isset($_POST['is_public']) ? 1 : 0;

    $file_name = null;
    $file_path = null;
    $file_type = null;

    if (empty($title) || empty($category)) {

        $error = "Title and category are required.";

    } else {

        if (
            isset($_FILES['file']) &&
            $_FILES['file']['error'] === 0
        ) {

            $allowed = [
                'pdf',
                'doc',
                'docx',
                'ppt',
                'pptx',
                'jpg',
                'jpeg',
                'png'
            ];

            $originalName = $_FILES['file']['name'];

            $extension = strtolower(
                pathinfo(
                    $originalName,
                    PATHINFO_EXTENSION
                )
            );

            if (!in_array($extension, $allowed)) {

                $error = "Invalid file type.";

            } else {

                $uploadDir = '../uploads/educational_materials/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $newFileName =
                    time() .
                    '_' .
                    preg_replace(
                        '/[^A-Za-z0-9\.\-_]/',
                        '',
                        $originalName
                    );

                $destination =
                    $uploadDir .
                    $newFileName;

                if (
                    move_uploaded_file(
                        $_FILES['file']['tmp_name'],
                        $destination
                    )
                ) {

                    $file_name = $originalName;

                    $file_path =
                        'uploads/educational_materials/' .
                        $newFileName;

                    $file_type = $extension;

                } else {

                    $error = "Failed to upload file.";
                }
            }
        }

        if (empty($error)) {

            $stmt = $pdo->prepare("
                INSERT INTO educational_materials
                (
                    title,
                    category,
                    description,
                    file_name,
                    file_path,
                    file_type,
                    youtube_url,
                    is_public,
                    created_by
                )
                VALUES
                (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?
                )
            ");

            $stmt->execute([
                $title,
                $category,
                $description,
                $file_name,
                $file_path,
                $file_type,
                $youtube_url,
                $is_public,
                $_SESSION['user_id']
            ]);

            $success = "Material published successfully.";
        }
    }
}
?>

<?php 
// Assuming required architecture layout headers are included above the snippet context:
// require '../includes/middleware_admin.php';
// require '../includes/db.php';
// require '../includes/admin_header.php';
// require '../includes/sidebar.php';
?>

<div class="max-w-4xl space-y-6">

    <header class="pb-5 border-b border-slate-200 flex items-end justify-between gap-4">
        <div>
            <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">Resource Hub</span>
            <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">Add Educational Material</h1>
            <p class="text-slate-500 text-sm mt-1">
                Upload documents, presentations, guides, and learning resources.
            </p>
        </div>
        <div>
            <a href="materials.php" class="text-xs font-bold tracking-wide uppercase text-slate-500 hover:text-slate-900 transition-colors">
                ← Return to Hub
            </a>
        </div>
    </header>

    <?php if(!empty($success)): ?>
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-medium flex items-center gap-2 shadow-sm animate-fade-in">
            <span class="text-base">✓</span> <?= htmlspecialchars($success) ?>
        </div>
    <?php endif; ?>

    <?php if(!empty($error)): ?>
        <div class="p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl text-sm font-medium flex items-center gap-2 shadow-sm animate-fade-in">
            <span class="text-base">✕</span> <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <div class="bg-white border border-slate-200/80 rounded-xl shadow-sm overflow-hidden p-6 sm:p-8">
        <form method="POST" enctype="multipart/form-data" class="space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        Resource Title *
                    </label>
                    <input type="text" 
                           name="title" 
                           required 
                           placeholder="e.g., Annual Impact Report"
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        Classification Category *
                    </label>
                    <div class="relative">
                        <select name="category" 
                                required 
                                class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-800 focus:outline-none focus:border-slate-400 focus:bg-white transition-all appearance-none cursor-pointer">
                            <option value="">Select Category</option>
                            <option>NGO Guidelines</option>
                            <option>Women Empowerment</option>
                            <option>Child Welfare</option>
                            <option>Health Awareness</option>
                            <option>Education</option>
                            <option>Government Schemes</option>
                            <option>Training Material</option>
                            <option>Meeting Documents</option>
                            <option>Policies</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                    Resource Summary Description
                </label>
                <textarea name="description" 
                          rows="4" 
                          placeholder="Provide a brief contextual abstract detailing the asset contents..."
                          class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-normal text-slate-800 placeholder-slate-400 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75 leading-relaxed resize-y"></textarea>
            </div>

            <div>
                <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                    Digital Document Asset File
                </label>
                <input type="file" 
                       name="file" 
                       class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2 text-sm text-slate-600 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-bold file:uppercase file:tracking-wide file:bg-slate-900 file:text-white hover:file:bg-slate-800 file:cursor-pointer transition-all">
                <p class="text-[11px] text-slate-400 mt-2 tracking-wide">
                    Accepted Extensions: <span class="font-mono bg-slate-100 px-1 py-0.5 rounded text-slate-600">PDF, DOC, DOCX, PPT, PPTX, JPG, JPEG, PNG</span>
                </p>
            </div>

            <div>
                <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                    YouTube Streaming URL <span class="text-slate-400 normal-case italic font-normal">(Optional)</span>
                </label>
                <input type="url" 
                       name="youtube_url" 
                       placeholder="https://www.youtube.com/watch?v=..."
                       class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-mono text-slate-700 placeholder-slate-400 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
            </div>

            <div class="pt-2">
                <label class="inline-flex items-center group cursor-pointer">
                    <input type="checkbox" 
                           name="is_public" 
                           checked 
                           class="w-4 h-4 rounded border-slate-300 text-slate-900 focus:ring-0 cursor-pointer accent-slate-900">
                    <span class="ml-2.5 text-sm font-semibold text-slate-700 group-hover:text-slate-900 select-none transition-colors">
                        Promote to Publicly Visible Index
                    </span>
                </label>
            </div>

            <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-end gap-3">
                <a href="materials.php" 
                   class="w-full sm:w-auto inline-flex items-center justify-center bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-bold tracking-wide uppercase px-6 py-3 rounded-lg transition-colors whitespace-nowrap">
                    Cancel & Return
                </a>
                <button type="submit" 
                        class="w-full sm:w-auto inline-flex items-center justify-center bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold tracking-wide uppercase px-6 py-3 rounded-lg transition-colors border border-slate-900 shadow-sm whitespace-nowrap">
                    Publish Knowledge Asset
                </button>
            </div>

        </form>
    </div>

</div>

</div> </div> <?php require '../includes/footer.php'; ?>