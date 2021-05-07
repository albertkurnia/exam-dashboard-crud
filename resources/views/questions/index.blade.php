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
        <h1 class="text-4xl font-bold mb-4">Exam Dashboard</h1>

        <a href="/questions/create" class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow my-4">Add Question</a>

        @foreach($questions as $question)
            <article class="mb-2">
                <p class="text-md text-gray-600">{{ $question->question_no}}. {{ $question->question }}</p>
                <a href="/questions/{{ $question->id }}/edit" class="text-xl font-bold text-blue-500">edit</a>
                <hr class="mt-2">
            </article>
        @endforeach
    </div>
</body>
</html>
