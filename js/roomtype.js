
fetch('../json/roomType.php')
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    console.log(data);

    data.forEach(element => {

        // Create the parent div element with class "frame"
        var frameDiv = document.createElement("div");
        frameDiv.classList.add("frame");

        // Create the image element and set the source attribute
        var image = document.createElement("img");
        image.src = element.roomImage;
        image.alt = element.roomName;

        // Create the div element with class "frameContainer"
        var containerDiv = document.createElement("div");
        containerDiv.classList.add("frameContainer");

        // Create the heading element
        var heading = document.createElement("h3");
        heading.textContent = element.roomName;

        // Create the paragraph element
        var paragraph = document.createElement("p");
        paragraph.textContent = element.roomShortDescription;

        // Create the anchor element for the "Discover more" link
        var link = document.createElement("a");
        link.href = "./room.html?id=" + element.roomId;
        link.classList.add("roomButton");
        link.textContent = "Discover more";

        // Append the child elements to the appropriate parent elements
        containerDiv.appendChild(heading);
        containerDiv.appendChild(paragraph);
        containerDiv.appendChild(link);

        frameDiv.appendChild(image);
        frameDiv.appendChild(containerDiv);

        // Append the frameDiv to an existing parent element in your HTML, or to the document body
        // For example:
        var parentElement = document.querySelector(".roomShowcase"); // Replace "parentElementId" with the actual ID of your parent element
        parentElement.appendChild(frameDiv);
    });

  })
  .catch(function(error) {
    // Gestisci eventuali errori di rete o della richiesta
    console.log('Si è verificato un errore:', error);
  });




