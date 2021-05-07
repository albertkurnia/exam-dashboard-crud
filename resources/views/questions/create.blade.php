<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Dashboard</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div style="width: 900px;" class="container max-w-full mx-auto pt-4">
        <h1 class="text-4xl font-bold mb-4">Create Question</h1>
            <form method="POST" action="/questions">
                @csrf

                <div class="mb-4">
                    <label class="font-bold text-gray-800" for="question_no">Question No: </label>
                    <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="question_no" name="question_no">
                </div>

                <div class="mb-4">
                    <label class="font-bold text-gray-800" for="question">Question: </label>
                    <textarea class="h-16 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="question" name="question"></textarea>
                </div>

                <div class="mb-4">
                    <label class="font-bold text-gray-800" for="status">Status: </label>
                    <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="status" name="status">
                </div>

                <div class="mb-4">
                    <label class="font-bold text-gray-800" for="first_answer">Answer 1: </label>
                    <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="first_answer" name="first_answer">
                </div>

                <div class="mb-4">
                    <label class="font-bold text-gray-800" for="second_answer">Answer 2: </label>
                    <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="second_answer" name="second_answer">
                </div>

                <div class="mb-4">
                    <label class="font-bold text-gray-800" for="third_answer">Answer 3: </label>
                    <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="third_answer" name="third_answer">
                </div>

                <div class="mb-4">
                    <label class="font-bold text-gray-800" for="fourth_answer">Answer 4: </label>
                    <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="fourth_answer" name="fourth_answer">
                </div>

                <div class="mb-4">
                    <label class="font-bold text-gray-800" for="true_answer">True Answer: </label>
                    <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="true_answer" name="true_answer">
                </div>

                <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Create</button>
                <a href="/questions" class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Cancel</a>
            </form>
    </div>
</body>
</html>
