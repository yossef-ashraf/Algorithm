The A* (A-star) algorithm is a popular pathfinding and graph traversal algorithm used in various fields, including computer science, robotics, and game development. It is known for its efficiency and accuracy in finding the shortest path between two nodes in a weighted graph. Below is a basic implementation of the A* algorithm in PHP.

```php
<?php

class Node {
    public $x;
    public $y;
    public $parent;
    public $g;
    public $h;
    public $f;

    public function __construct($x, $y, $parent = null, $g = 0, $h = 0) {
        $this->x = $x;
        $this->y = $y;
        $this->parent = $parent;
        $this->g = $g;
        $this->h = $h;
        $this->f = $g + $h;
    }

    public function __toString() {
        return "({$this->x}, {$this->y})";
    }
}

function heuristic($start, $end) {
    // Using Manhattan distance as the heuristic
    return abs($start->x - $end->x) + abs($start->y - $end->y);
}

function findPath($start, $end, $grid) {
    $openList = [];
    $closedList = [];
    
    $startNode = new Node($start[0], $start[1]);
    $endNode = new Node($end[0], $end[1]);
    
    $openList[] = $startNode;

    while (!empty($openList)) {
        // Get the node with the lowest f score
        usort($openList, function($a, $b) {
            return $a->f - $b->f;
        });

        $currentNode = array_shift($openList);
        $closedList[] = $currentNode;

        // If we have reached the end, reconstruct the path
        if ($currentNode->x == $endNode->x && $currentNode->y == $endNode->y) {
            $path = [];
            while ($currentNode) {
                $path[] = $currentNode;
                $currentNode = $currentNode->parent;
            }
            return array_reverse($path);
        }

        // Generate children
        $children = [];
        $moves = [
            [-1, 0], [1, 0], [0, -1], [0, 1] // Left, Right, Up, Down
        ];

        foreach ($moves as $move) {
            $nodePosition = [$currentNode->x + $move[0], $currentNode->y + $move[1]];

            // Make sure within range
            if ($nodePosition[0] > count($grid) - 1 || $nodePosition[0] < 0 ||
                $nodePosition[1] > count($grid[0]) - 1 || $nodePosition[1] < 0) {
                continue;
            }

            // Make sure walkable terrain
            if ($grid[$nodePosition[0]][$nodePosition[1]] != 0) {
                continue;
            }

            $newNode = new Node($nodePosition[0], $nodePosition[1], $currentNode);
            $children[] = $newNode;
        }

        // Loop through children
        foreach ($children as $child) {
            // If child is on the closed list, skip it
            foreach ($closedList as $closedChild) {
                if ($child->x == $closedChild->x && $child->y == $closedChild->y) {
                    continue 2;
                }
            }

            // Create the f, g, and h values
            $child->g = $currentNode->g + 1;
            $child->h = heuristic($child, $endNode);
            $child->f = $child->g + $child->h;

            // If child is already in open list and has a higher g value, skip it
            foreach ($openList as $openNode) {
                if ($child->x == $openNode->x && $child->y == $openNode->y && $child->g > $openNode->g) {
                    continue 2;
                }
            }

            $openList[] = $child;
        }
    }

    return null; // No path found
}

// Example usage
$grid = [
    [0, 1, 0, 0, 0],
    [0, 1, 0, 1, 0],
    [0, 0, 0, 1, 0],
    [0, 1, 1, 1, 0],
    [0, 0, 0, 0, 0]
];

$start = [0, 0];
$end = [4, 4];
$path = findPath($start, $end, $grid);

if ($path) {
    echo "Path found:\n";
    foreach ($path as $node) {
        echo $node . "\n";
    }
} else {
    echo "No path found.\n";
}
?>
```

### Explanation

1. **Node Class**: Represents a node in the grid. It stores coordinates (x, y), parent node, and the costs `g` (from start to the node), `h` (heuristic cost to the end), and `f` (total cost).

2. **Heuristic Function**: Uses the Manhattan distance as the heuristic function, which is suitable for a grid-based pathfinding problem.

3. **Find Path Function**: Implements the A* algorithm:
   - Initializes the open and closed lists.
   - Adds the start node to the open list.
   - Continuously processes nodes from the open list with the lowest `f` value.
   - Generates children nodes (possible moves from the current node).
   - Checks if each child node is the end node or if it should be added to the open list.
   - Returns the path from start to end if found, or null if no path exists.

4. **Example Usage**: Defines a grid, a start, and an end point. Calls the `findPath` function and prints the path if found.

This implementation should help you understand how the A* algorithm works and how to implement it in PHP for grid-based pathfinding.